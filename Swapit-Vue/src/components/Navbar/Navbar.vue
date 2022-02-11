<template>
    <div class="navbar-ctn">
        <div class="logo">
            <img src="../../assets/images/logo.svg" width="60" height="30">
            <img src="../../assets/images/logo-text.svg" width="60" height="30">
        </div>
        <SearchInput></SearchInput>
        <div class="picto-ctn">
            <router-link to="/owngameslist"><img class="picto-nav" src="../../assets/images/check.svg" width="25" height="20"></router-link>
            <router-link to="/wishgameslist"><img class="picto-nav" src="../../assets/images/heart.svg" width="20" height="20"></router-link>
            <img class="picto-nav" src="../../assets/images/mail.svg" width="20" height="20">
            <router-link to="/signin"><img class="picto-nav" src="../../assets/images/user.svg" width="20" height="20"></router-link>
            <router-link to="/signup">Inscription</router-link>
        </div>
    </div>
</template>

<script>
    import SearchInput from "./SearchInput.vue";
    export default {
        components: {
            SearchInput,
        }
    }
</script>

<style>
.navbar-ctn{
    display: flex;
    height: auto;
    background-color: white;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}
.picto-ctn{
    display: flex;
    justify-content: space-between;
}
.picto-nav{
    margin-left: 10px;
}

</style>