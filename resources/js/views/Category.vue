<template>
  <div>

  </div>
</template>

<script>
export default {
    data(){
        return{
            action:"",
            data:{
                name:"",
                id:"",
                img:""
            }
        }
    },
    methods:{
        vide:function(){
            this.data.id = "";
            this.data.name = "";
            this.data.img = "";
        },
        getAction:function(type){
            if(type == 1 && (this.action =="" || this.action =="edit")){
                this.vide();
                this.action = "add";
            }
            if(type == 2 && (this.action =="" || this.action =="add")){
                this.vide();
                this.action = "edit";
            }
            else{
                this.vide();
                this.action = "";
            }
        }
    }

}
</script>

<style>

</style>