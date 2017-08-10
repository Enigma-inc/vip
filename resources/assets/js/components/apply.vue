<template>
  <div class="assign-questions">
        <div class="panel panel-primary" v-for="category in allQuestions" :key="category.id">
            <div class="panel-heading">
                {{category.name}}
            </div>
            <div class="panel-body">
                <div class="question-container" v-for="question in category.questions" :key="question.id">
                     <!-- <input type="checkbox" @click="toggleSessionQuestion(question)" :checked="questionAssigned(question)"> -->
                     <p  v-html="question.question"></p>
                      <vue-editor v-model="question.answer" ></vue-editor>
                </div>
            </div>
        </div>
        <button class="btn" @click='submit()'>Submit</button>
   
  </div>
</template>
<script>
import { VueEditor } from 'vue2-editor'
import toastr from 'toastr';
    export default{
         components: {
               VueEditor
         },
        props:['sessionId'],
        data(){
            return{
                content: '<h1>Editor 1 Starting Content</h1>',
                allQuestions:[],
                sessionQuestions:[]
                
            }
        },
        mounted(){
           this.getAllQuestions();
           this.getSessionQuestions();
        },
        methods:{
            submit(){
                console.log(this.allQuestions.questions);
            },
            getSessionQuestions(){
                axios.get(`../../../admin/api/application-sessions/${this.sessionId}/questions`).then(res=>{
                    this.sessionQuestions=res.data;
                });
            },
            getAllQuestions(){
                axios.get(`../../../admin/api/question-categories`).then(res=>{
                    this.allQuestions=res.data;
                });
            },
           questionAssigned(question){
               let found =false;
                _.forEach(this.sessionQuestions,(item)=>{
                     if(item.id==question.id){
                        found= true;
                     }
                 });
                 return found;
                },
            toggleSessionQuestion(question){
                    axios.get(`../../../admin/api/application-sessions/${this.sessionId}/add-question/${question.id}`).then(()=>{
                        toastr.success('Succss!')
                    });
            }  

                
        },
        computed:{
           
        }
    }
</script>