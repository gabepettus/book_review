function validateBook()
{
    let $validateForm = true;

    if( document.getElementById("name").value == null || document.getElementById("name").value == "" )
    {
        document.getElementById("errBookName").innerHTML = "You must specify a name.";
        document.getElementById("errBookName").classList.add('errormsg');
        document.getElementById("name").classList.add('error');
        $validateForm = false;
    }

    if( document.getElementById("author").value == null || document.getElementById("author").value == "" )
    {
        document.getElementById("errAuthor").innerHTML = "You must specify an author.";
        document.getElementById("errAuthor").classList.add('errormsg');
        document.getElementById("author").classList.add('error');
        $validateForm = false;
    }

    return $validateForm;
}