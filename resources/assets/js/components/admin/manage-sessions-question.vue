<template>
  <div>
      <p v-for="question in questions" :key="question.id" v-html="question.question"></p>
  </div>
</template>
<script>
    export default{
        props:['sessionId'],
        data(){
            return{
                questions:[]
            }
        },
        mounted(){
           this.getQuestions();
        },
        methods:{
            getQuestions(){
                axios.get(`../../../admin/api/application-sessions/1/questions`).then(res=>{
                    this.questions=res.data;
                });
            }
        }
    }
</script>