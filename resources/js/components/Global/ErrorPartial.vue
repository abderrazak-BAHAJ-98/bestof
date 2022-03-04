<template>
    <small v-if="userRegisterError[word]">
        <span v-for="err in userRegisterError[word]">
            {{ err }}
        </span>
    </small>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    props:['word'],
    computed:{
        ...mapGetters(["userRegisterError"])
    }
};
</script>

<style></style>
