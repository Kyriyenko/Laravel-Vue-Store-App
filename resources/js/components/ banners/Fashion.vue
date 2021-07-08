<template>
<div>
    <div class="container">
        <img :src="require('../../../../resources/images/sub5.jpg').default" class="img-fluid" alt="Logo">
    </div>
</div>
</template>

<script>
export default {
    name: "Fashion"
}
</script>

<style scoped>
.container{
    display: flex;
    justify-content: center;
}

</style>
