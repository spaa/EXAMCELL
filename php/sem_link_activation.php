<?php
if($_SESSION['user_type']!="HOD"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}
include'dashboard_header.php';

?>
    <div><p id="display"></p></div>
    <form class="w3-mobile w3-margin w3-responsive" action="sem_link_activation.inc.1.php" method="post"
        enctype="multipart/form-data">
        <table class="w3-table-all w3-card-4">
            <tr class="w3-container w3-teal">
                <th class="">TYPE</th>
                <th class="">ACTIVATE/DEACTIVATE</th>
                <th class="">COMMENT</th>
            </tr>
            <tr class="w3-container">
                <td>UT1</td>
                <td><input class="w3-button w3-round-xxlarge w3-black w3-hover-teal" type="submit" value="ACTIVATE" name="1"></td>
                <td>You can activate the link</td>
            </tr>
            <tr class="w3-container">
                <td>UT2</td>
                <td><input disabled="true" class="w3-button w3-grey w3-round-xxlarge" type="submit" value="DISABLED" name="2"></td>
                <td>Currently the link is disabled</td>
            </tr>
            <tr class="w3-container">
                <td>TERMWORK</td>
                <td><input disabled="true" class="w3-button w3-grey w3-round-xxlarge" type="submit" value="DISABLED" name="3"></td>
                <td>Currently the link is disabled</td>
            </tr>
            <tr class="w3-container">
                <td>PRACTICAL</td>
                <td><input disabled="true" class="w3-button w3-grey w3-round-xxlarge" type="submit" value="DISABLED" name="4"></td>
                <td>Currently the link is disabled</td>
            </tr>
            <tr class="w3-container">
                <td>THEORY</td>
                <td><input disabled="true" class="w3-button w3-grey w3-round-xxlarge" type="submit" value="DISABLED" name="5"></td>
                <td>Currently the link is disabled</td>
            </tr>
            
        </table>
    </form>
    
    <div id="demo"></div>

<script>
    //checking which link is activated
    var data;

    var input_field, tr_tag;

    //loop counters
    var f,i;
    //TODO:-demo counter remove after test
    var c=0;
    var z;

    function checkLink() {
        var xhttp;
        if (window.XMLHttpRequest)
            xhttp = new XMLHttpRequest();
        else
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = parseInt(this.responseText);

                //to dislay what data is fetched
                document.getElementById("demo").innerHTML = "data fetched"+data;

                //access to inputfields and tr(comment cell)
                input_field = document.getElementsByTagName("input");
                tr_tag = document.getElementsByTagName("tr");

                
                //if no links are activated yet
                if (data == -1) { 
                    //link which can be activated
                    //add comment to link which can be activated
                    tr_tag[1].getElementsByTagName("td")[2].innerHTML = "You can activate the link";
                    //add hover effect
                    if (input_field[0].classList) {
                        input_field[0].classList.add("w3-black","w3-hover-teal");
                    } else {
                        //for IE9 browser...CROSS BROWSER SOLUTION
                        var arr = input_field[0].className.split(" ");
                        if (arr.indexOf("w3-hover-teal") == -1)
                            input_field[0].className += " w3-black w3-hover-teal";
                    }
                    input_field[0].value = "ACTIVATE";
                } else {
                    //disable all expired(depricated) links
                    for (f = 0; f < data; f++) {
                        //Comment currently activated link
                        tr_tag[f+1].getElementsByTagName("td")[2].innerHTML = "EXPIRED";
                        //change the activated link color
                        if (input_field[f].classList) {
                            input_field[f].classList.remove("w3-black","w3-teal","w3-hover-teal","w3-grey");
                            input_field[f].classList.add("w3-red","w3-hover-red");
                        } else {
                            //for IE9 browser...CROSS BROWSER SOLUTION
                            input_field[f].className = input_field[f].className.replace(/\bw3-black\b/g,"");
                            input_field[f].className = input_field[f].className.replace(/\bw3-teal\b/g,"");
                            input_field[f].className = input_field[f].className.replace(/\bw3-hover-teal\b/g,"");
                            input_field[f].className = input_field[f].className.replace(/\bw3-grey\b/g,"");
                            var arr = input_field[f].className.split(" ");
                            if (arr.indexOf("w3-red") == -1)
                                input_field[f].className += " w3-red w3-hover-red";
                        }
                        //input_field[f].disabled = true;
                        input_field[f].onclick = function(){
                        return false;
                        };
                        input_field[f].value = "DISABLED";
                    }
                    //link which is activated
                    //Comment currently activated link
                    tr_tag[data+1].getElementsByTagName("td")[2].innerHTML = "Link is activated";
                    //change the activated link color
                    if (input_field[data].classList) {
                        input_field[data].classList.remove("w3-black","w3-grey");
                        input_field[data].classList.add("w3-teal","w3-hover-teal");
                    } else {
                        //for IE9 browser...CROSS BROWSER SOLUTION
                        input_field[data].className = input_field[data].className.replace(/\bw3-black\b/g,"");
                        input_field[data].className = input_field[data].className.replace(/\bw3-grey\b/g,"");
                        var arr = input_field[data].className.split(" ");
                        if (arr.indexOf("w3-teal") == -1)
                            input_field[data].className += " w3-teal w3-hover-teal";
                    }
                    input_field[data].disabled = false;
                    input_field[data].value = "ACTIVATED";

                    //very important step:-to avoid creating same message again
                    //Explanation:-Sine the link is activated message is already stored
                    //but on clicking it again submit button will fire and same message will be stored and displayed to teacher
                    //to avoid this we disable the submit function by creating the onclick function
                    input_field[data].onclick = function(){
                        return false;
                    };
                    
                    if(c%10==0 && data<4){
                        z = data+1;
                        tr_tag[z+1].getElementsByTagName("td")[2].innerHTML = "You can activate the link";
                        if (input_field[z].classList) {
                        input_field[z].classList.remove("w3-grey");
                        input_field[z].classList.add("w3-hover-teal","w3-black");
                        }
                        else{
                        input_field[z].className = input_field[z].className.replace(/\bw3-grey\b/g,"");
                        var arr = input_field[z].className.split(" ");
                        if (arr.indexOf("w3-black") == -1)
                            input_field[z].className += " w3-hover-teal w3-black";
                        }
                        input_field[z].disabled = false;
                        input_field[z].value = "ACTIVATE";
                    }
                    
                    c++;
                    /*Below code not required
                    //disable all other links
                    for (i = data + z+1; i < input_field.length; i++) {
                        var comment = tr_tag[i + 1].getElementsByTagName("td")[2];
                        input_field[i].classList.add("w3-grey");
                        input_field[i].disabled = true;
                        input_field[i].value = "Disabled";
                        comment.innerHTML = "Currently the link is disable "
                    }*/
                }
            }
            
        };

        //this variables are required to access folder
        //current time
        var d = new Date();
        //current year
        var y = d.getFullYear();
        //department
        var department = document.getElementById("department").innerHTML;
        document.getElementById("display").innerHTML = y+department;
        var file = "../files/notification_for_exam_link_activation_by_hod_per_year/"+y+"/"+department+"/link_activated.txt"; 
        xhttp.open("GET", file, true);
        xhttp.send();
        setTimeout(checkLink, 1000);
    }
    checkLink();

</script>

</html>