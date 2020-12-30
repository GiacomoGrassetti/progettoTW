<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vue.js in PHP</title>
    <script src="js/vue.js"></script>
</head>
<body>
    <div id="app">
    {{message}}
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
 new Vue({
     el: "#app",
     data: {
        message: 'Hello Vue from PHP!'
     }
 });
</script>