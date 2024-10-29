<template>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>





                <a class="navbar-brand" vbind:href="url">
                    {{ titulo }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <slot></slot>
                </ul>
            </div>
        </div>
    </nav>

</template>

<script>
export default {
    props: ['titulo', 'url']
}

const promise = new Promise((resolve, reject) => {
setTimeout(() => resolve("Completed!"), 1000);
});

promise.then(data => {
console.log(data);
return "Success!";}).then(data => {
console.log(data);
});

</script>
