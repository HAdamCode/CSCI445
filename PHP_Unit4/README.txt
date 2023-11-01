1) In the traditional model, the form's action specifies what happens when the submit button is pressed. How does the sample code connect the submit button to jQuery? (i.e., what line(s) of code do this).

    There is an action that sits on top of the submit button. This is activated with a $("#submit").click(function(){}) method.

2) What PHP file will be executed on the server?

    ajaxsubmit.php

3) How does this code collect data from the form to pass to the server/php?

    It grabs the data based on the element and then the value the element has. For example, 
    var name = $("#name").val();

4) What line of JavaScript code is executed in the callback function?

    alert(result);

5) How does the PHP function provide the value to be displayed in the callback function? (i.e., what line of code "returns" the message that is displayed).

    It provides value using the echo statement. For example, 
    echo "Form Submitted Successfully";
    