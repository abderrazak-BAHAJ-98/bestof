<template>
    <div class="row">
        <div class="offset-md-3 col-md-6  text-center">
        <img src="/images/logo.png" alt="Images" class=".cls-img-error">
		<h1 class="error-h1">4 <span>0</span> 4</h1>
		<h3>Oops! Page Not Found</h3>
		<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
		<router-link to="/" class="btn btn-outline-secondary m-4">
            Return To Home Page
        </router-link>
	</div>
    </div>
</template>

<script>
export default {

}
</script>

<style>
.error-h1{
    font-size: 9em;
    color:black;
}
.error-h1 span{
    color: red;
}
.cls-img-error{
    max-width: 15em;
    margin-top: -20;
}
</style>