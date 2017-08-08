<template>
  <div class="assign-questions">

        <div class="panel panel-primary" v-for="category in allQuestions" :key="category.id">
            <div class="panel-heading">
                {{category.name}}
            </div>
            <div class="panel-body">
                <div class="question-container" v-for="question in category.questions" :key="question.id">
                     <input type="checkbox" @click="toggleSessionQuestion(question)" :checked="questionAssigned(question)">
                     <p  v-html="question.question"></p>
                </div>
            </div>
        </div>
   
  </div>
</template>
<script>
import toastr from 'toastr';
    export default{
        props:['sessionId'],
        data(){
            return{
                allQuestions:[],
                sessionQuestions:[]
                
            }
        },
        mounted(){
           this.getAllQuestions();
           this.getSessionQuestions();
        },
        methods:{
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