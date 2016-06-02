<script src="//code.jquery.com/jquery-1.8.0.min.js"></script>
<script>
var runShellScript = function () {
    $.get('/var/www/html/tabview/ledBlink.php', function () {
        alert('Shell script done!');
    });
};
// Some stuff
runShellScript();
</script>

