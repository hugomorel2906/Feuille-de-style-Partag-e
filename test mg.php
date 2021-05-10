<html>

<html>
    <body>
        <!--name.php to be called on form submission-->
        <form method = 'post'> 
            <h4>SELECT SUJECTS</h4>
              
            <select name = 'subject[]' multiple size = 6>  
                <option value = 'english'>ENGLISH</option>
                <option value = 'maths'>MATHS</option>
                <option value = 'computer'>COMPUTER</option>
                <option value = 'physics'>PHYSICS</option>
                <option value = 'chemistry'>CHEMISTRY</option>
                <option value = 'hindi'>HINDI</option>
            </select>
            <input type = 'submit' name = 'submit' value = ffdf>
        </form>
    </body>
</html>
<?php
      
    // Check if form is submitted successfully
    if(isset($_POST["submit"])) 
    {
        // Check if any option is selected
        if(isset($_POST["subject"])) 
        {
            // Retrieving each selected option
            foreach ($_POST['subject'] as $subject) 
                print "You selected $subject<br/>";
        }
    else
        echo "Select an option first !!";
    }
?>


<a href="https://restpack.io/html2pdf/save-as-pdf?private=true" target="_blank" rel="nofollow">Save this page as PDF</a>
<script async src="https://restpack.io/save-as-pdf.js"></script>

</html>