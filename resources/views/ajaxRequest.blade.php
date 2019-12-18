<!DOCTYPE html>
<html>
<head>
    
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <div id="root">
        <input type="text" id="input" v-model="message">
        <p>Hello: <b>{{ @message }}</b></p>
    </div>

    <script>
        var app = new Vue({
            el: "#root",
            data: {
                message: "Vue.js is cool"
            }
        });
    </script>
</body>