<template>
  <div class="assign-questions">
         <div class="panel panel-primary" v-for="category in questionCategories" :key="category.id">
            <div class="panel-heading">
                {{category.name}}
            </div>
            <div class="panel-body">
                <div class="question-container" v-for="answer in category.answers" :key="answer.answerId">
                     <p  v-html="answer.question" class="ckeditor col-xs-12"></p>
                      <textarea class="summernote col-xs-12" :id="answer.editorId" v-model="answer.answerText" ></textarea>
                      <hr/>
                </div>
            </div>
        </div>
      
        <Vueditor></Vueditor>
        <button class="btn" @click='submit()'>Submit</button> 
   
  </div>
</template>
<script>
import toastr from 'toastr';
    export default{
        props:['sessionId','inputCategories','inputAnswers'],
        data(){
            return{
                questionCategories:[],


                   contentA: '',
                   contentB: ''
            }
        },
        mounted(){
            this.buildQuestions();
           
        },
        methods:{
            buildQuestions(){
                this.inputCategories.forEach(function(category) {
                    let ans=[];
                    this.inputAnswers.forEach(function(answer){
                        if(answer.categoryId==category.id){
                            ans.push({
                                "editorId":'editor'+answer.answerId,
                                "answerId": answer.answerId,
                                "answerText": answer.answer,
                                "questionId": answer.questionId,
                                "question": answer.question,
                                "categoryId": answer.categoryId,
                                "categoryName": answer.categoryName
                            });
                            
                        }
                    },this);
                    this.questionCategories.push({
                        id:category.id,
                        name:category.name,
                        index:category.index,
                        answers:ans
                    });
                }, this);
            },
            submit(){
                axios.post(`../../session/${this.sessionId}/apply`,this.questionCategories).then(response=>{
                    console.log("Server Response...",this.response);
                });
            },

                
        },
        computed:{
           
        }
    }
</script>

<style lang="scss" scoped>
    .question-container{
        display:flex;
        flex-direction: column;
    }
</style>
