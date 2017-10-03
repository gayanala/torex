<div class="panel-heading"><h1>Generate URL for Donations</h1></div>




<script type="text/javascript">
    function Copy() {
        //var Url = document.createElement("textarea");
        //var orgId = "{{Auth::user()->organization_id}}";

        urlCopied.innerHTML = "https://www.website.com/path?orgId={{Auth::user()->organization_id}}" ;
        //Copied = Url.createTextRange();
        //Copied.execCommand("Copy");
        window.confirm("You have successfully generated the URL needed for donation Requests on your website")
        var txt;

    }
</script>
<body>
<div>

    <input type="button" value="Copy Url" onclick="Copy();" />
    <br />

    Paste: <textarea id="urlCopied" rows="1" cols="45"></textarea>

</div>






</body>