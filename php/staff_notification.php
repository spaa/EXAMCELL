<?php include'dashboard_header.php';
if($_SESSION['user_type']!="STAFF"){
	echo "<script>window.location.href='403-forbidden-error.php';</script>";
}
?>
<br><br>
<div class="w3-container">
    <div class="w3-container w3-bar w3-teal w3-large">
        <h1 class="w3-bar-item w3-wide w3-xlarge" id="notify" style="font-family:'Allerta Stencil';"> MESSAGES</h1>
        <b class="w3-bar-item w3-right w3-badge w3-margin-right w3-margin-top" id="messageCount"></b>
    </div>
    <div class="w3-container w3-card-4 w3-center" id="messageNotification">
    </div>
</div>
<script>
    //data returned from ajax call will be stored here
    var data = '';

    //message counter
    var m = 0;
    var no_message_notify = 0;

    function notify() {
        var xhttp;

        if (window.XMLHttpRequest) {
            // code for modern browsers TODO
            xhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                console.log(data);
                //message_count
                document.getElementById("messageCount").innerHTML = data[0].count;
                document.getElementById("messageCount").classList.add("NotificationAnimation");

                //change message color
                document.getElementById("notify").classList.add("NotificationAnimation");

                //if no message is there
                if (data[0].count == 0 && no_message_notify == 0) {
                    //change color of notification
                    if(document.getElementById("messageCount").classList.remove)
                    document.getElementById("messageCount").classList.remove("NotificationAnimation");
                    else{
                        document.getElementById("messageCount").className = document.getElementById("messageCount").className.replace(/\bNotificationAnimation\b/g, "");
                    }
                    var msg_box = document.createElement("DIV");
                    var att = document.createAttribute("class");
                    att.value = "w3-container w3-padding-large msg_box";
                    msg_box.setAttributeNode(att);
                    msg_box.innerHTML = "CURRENTLY THERE ARE NO MESSAGES";
                    document.getElementById("messageNotification").appendChild(msg_box);
                    no_message_notify = 1;
                }

                //to stop infinite looping..i.e showing same message again and again 
                if (m > data[0].message.length) {
                    //message deleted will be gone on reload
                    location.reload();
                }

                //printing messages
                for (var i = m; i < data[0].message.length; i++) {
                    //stops the infinite looping of message 
                    //because ajax is called automatically after 1 second but
                    //draw back is :-if the messages is deleted from json file it still shows that message
                    /*
                    if (m == data[0].message.length)
                        continue;
                    */

                    //change color of notification
                    if(document.getElementById("messageCount").classList.add)
                    document.getElementById("messageCount").classList.add("NotificationAnimation");
                    else{
                        document.getElementById("messageCount").className += "NotificationAnimation";
                    }
                    //creating element dynamically

                    //message outer part
                    var msg_box = document.createElement("DIV");
                    var att = document.createAttribute("class");
                    att.value = "w3-container w3-padding-large msg_box";
                    msg_box.setAttributeNode(att);
                    document.getElementById("messageNotification").appendChild(msg_box);
                    //document.body.appendChild(msg_box);

                    //message box
                    var msg = document.createElement("DIV");
                    var att = document.createAttribute("class");
                    att.value = "w3-card w3-center msg";
                    msg.setAttributeNode(att);
                    document.getElementsByClassName("msg_box")[m].appendChild(msg);

                    //message head
                    var msg_head = document.createElement("DIV");
                    var att = document.createAttribute("class");
                    att.value = "w3-container w3-padding-large w3-teal msg_head";
                    msg_head.setAttributeNode(att);
                    document.getElementsByClassName("msg")[m].appendChild(msg_head);

                    //inside message head
                    //date of message on left side
                    var msg_date = document.createElement("SPAN");
                    var att = document.createAttribute("class");
                    att.value = "w3-left-align msg_date";
                    msg_date.setAttributeNode(att);
                    document.getElementsByClassName("msg_head")[m].appendChild(msg_date);
                    var data_enter = document.getElementsByClassName("msg_date")[m];
                    data_enter.setAttribute("style", "float:left;");
                    data_enter.innerHTML = data[0].message[i].date;

                    //message send from placed at center
                    var msg_from = document.createElement("SPAN");
                    var att = document.createAttribute("class");
                    att.value = "w3-center w3-large msg_from";
                    msg_from.setAttributeNode(att);
                    document.getElementsByClassName("msg_head")[m].appendChild(msg_from);
                    document.getElementsByClassName("msg_from")[m].innerHTML = "From:-" + data[0].message[i]
                        .from;

                    //day and time of message placed on right side
                    var msg_day_time = document.createElement("SPAN");
                    var att = document.createAttribute("class");
                    att.value = "w3-right-align msg_day_time";
                    msg_day_time.setAttributeNode(att);
                    document.getElementsByClassName("msg_head")[m].appendChild(msg_day_time);
                    data_enter = document.getElementsByClassName("msg_day_time")[m];
                    data_enter.setAttribute("style", "float:right;");
                    data_enter.innerHTML = data[0].message[0].day + "," + data[0].message[i].time;

                    //messsage body
                    var msg_body = document.createElement("DIV");
                    var att = document.createAttribute("class");
                    att.value = "w3-container w3-white w3-padding-large msg_body";
                    msg_body.setAttributeNode(att);
                    document.getElementsByClassName("msg")[m].appendChild(msg_body);

                    //message
                    var msg_text = document.createElement("P");
                    var att = document.createAttribute("class");
                    att.value = "w3-left-align w3-padding-large msg_text";
                    msg_text.setAttributeNode(att);
                    document.getElementsByClassName("msg_body")[m].appendChild(msg_text);
                    document.getElementsByClassName("msg_text")[m].innerHTML = data[0].message[i].msg;

                    /*button_bar
                      -----------------------------
                      |                           |
                      |button_msg       button    |
                      -----------------------------                    
                    */
                    if (data[0].message[m].viewed == "no" && data[0].message[m].notification!="SUBJECT ALLOTED") {
                        //outer box for button:-it will contain a message and button
                        var button_bar = document.createElement("DIV");
                        var att = document.createAttribute("class");
                        att.value = "w3-display-container button_bar";
                        button_bar.setAttributeNode(att);
                        document.getElementsByClassName("msg_body")[m].appendChild(button_bar);

                        //button form
                        var button_form = document.createElement("FORM");
                        var att = document.createAttribute("method");
                        att.value = "post";
                        button_form.setAttributeNode(att);
                        //Earlier we were refering to ut_term_pracs_th.php page now we will directly transfer to enter_marks.php page
                        //we will perform action by clicking the ENTER MARKS button
                        /*var att = document.createAttribute("action");
                        att.value = "../php/ut_term_pracs_th.php";
                        button_form.setAttributeNode(att);*/
                        var att = document.createAttribute("class");
                        att.value = "w3-container button_form";
                        button_form.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        //att.value = "form_"+m;
                        att.value = "form_id";
                        button_form.setAttributeNode(att);
                        var att = document.createAttribute("enctype");
                        att.value = "multipart/form-data";
                        button_form.setAttributeNode(att);
                        document.getElementsByClassName("button_bar")[m].appendChild(button_form);

                        //button_main
                        var button_main = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "submit";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-bar-item w3-left w3-button w3-teal w3-hover-teal w3-large button_main";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = data[0].count - m;
                        //att.value = "exam_marks";
                        button_main.setAttributeNode(att);
                        //New 1.1v:- directly transferingto enter_marks.php page
                        var att = document.createAttribute("onclick");
                        att.value = "return true";
                        //att.value = "submit_function(this)";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        //att.value = data[0].count-m;
                        //att.value = "enter_marks";      //to transfer to ut_term_pracs_th.php page V1.0               
                        att.value = "exam_marks";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "ENTER " + data[0].message[i].notification + " MARKS";
                        button_main.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_main);

                        //MARK READ CONTAINER
                        var mark_read_container = document.createElement("DIV");
                        var att = document.createAttribute("class");
                        att.value = "w3-bar-item w3-right w3-hover-teal w3-text-hover-white mark_read_container";
                        mark_read_container.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(mark_read_container);

                        //MARK AS READ BUTTON
                        var button_read = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "submit";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-left w3-hover-none w3-hover-border-none w3-large button_read";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "button_read";
                        button_read.setAttributeNode(att);
                        //New 1.1v:- not transfering to enter_marks.php page
                        var att = document.createAttribute("onclick");
                        att.value = "return true";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "button_read";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "MARK AS READ";
                        button_read.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read);

                        //DOUBLE TICK FOR MARK AS READ BUTTON FONT AWESOME ICON
                        /*var button_read_tick_span = document.createElement("SPAN");
                        var att = document.createAttribute("class");
                        att.value = "fa fa-check fa-2x w3-right button_read_tick_span";
                        button_read_tick_span.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read_tick_span);*/

                        //DOUBLE TICK FOR MARK AS READ BUTTON 
                        var button_read_tick = document.createElement("IMG");
                        var att = document.createAttribute("src");
                        att.value = "../icons/blue single tick.png";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("width");
                        att.value = "30px";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("height");
                        att.value = "36px";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-right button_read_tick";
                        button_read_tick.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read_tick);

                        //hidden input element containing (id value of form)
                        var form_id = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "form_" + m;
                        form_id.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(form_id);

                        //hidden input element containing (type of exam)
                        var button_exam_type = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].notification;
                        button_exam_type.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_exam_type);

                        //hidden input element containing (subject batch no)
                        var button_subject_batch_no = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_batch_no;
                        button_subject_batch_no.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_batch_no);

                        //hidden input element containing (class batch no)
                        var button_batch_no = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].batch_no;
                        button_batch_no.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_batch_no);

                        //hidden input element containing (subject name)
                        var button_subject_name = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_name;
                        button_subject_name.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_name);

                        //hidden input element containing (subject short name)
                        var button_subject_short_name = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_short_name;
                        button_subject_short_name.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_short_name);

                        //hidden input element containing (subject code)
                        var button_subject_code = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_code;
                        button_subject_code.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_code);

                        //hidden input element containing (total no of subjects teacher is taking)
                        var button_total_no_of_subjects = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].count;
                        button_total_no_of_subjects.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_total_no_of_subjects);
                    }
                    else if (data[0].message[m].viewed == "no" && data[0].message[m].notification=="SUBJECT ALLOTED"){
                        //outer box for button:-it will contain a message and button
                        var button_bar = document.createElement("DIV");
                        var att = document.createAttribute("class");
                        att.value = "w3-display-container button_bar";
                        button_bar.setAttributeNode(att);
                        document.getElementsByClassName("msg_body")[m].appendChild(button_bar);

                        //button form
                        var button_form = document.createElement("FORM");
                        var att = document.createAttribute("method");
                        att.value = "post";
                        button_form.setAttributeNode(att);
                        //Earlier we were refering to ut_term_pracs_th.php page now we will directly transfer to enter_marks.php page
                        //we will perform action by clicking the ENTER MARKS button
                        /*var att = document.createAttribute("action");
                        att.value = "../php/ut_term_pracs_th.php";
                        button_form.setAttributeNode(att);*/
                        var att = document.createAttribute("class");
                        att.value = "w3-container button_form";
                        button_form.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        //att.value = "form_"+m;
                        att.value = "form_id";
                        button_form.setAttributeNode(att);
                        var att = document.createAttribute("enctype");
                        att.value = "multipart/form-data";
                        button_form.setAttributeNode(att);
                        document.getElementsByClassName("button_bar")[m].appendChild(button_form);

                        //button_main
                        var button_main = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "submit";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-bar-item w3-hide w3-left w3-button w3-teal w3-hover-teal w3-large button_main";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = data[0].count - m;
                        //att.value = "exam_marks";
                        button_main.setAttributeNode(att);
                        //New 1.1v:- directly transferingto enter_marks.php page
                        var att = document.createAttribute("onclick");
                        att.value = "return false";
                        //att.value = "submit_function(this)";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        //att.value = data[0].count-m;
                        //att.value = "enter_marks";      //to transfer to ut_term_pracs_th.php page V1.0               
                        att.value = "exam_marks";
                        button_main.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_main);

                        //MARK READ CONTAINER
                        var mark_read_container = document.createElement("DIV");
                        var att = document.createAttribute("class");
                        att.value = "w3-bar-item w3-right w3-hover-teal w3-text-hover-white mark_read_container";
                        mark_read_container.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(mark_read_container);

                        //MARK AS READ BUTTON
                        var button_read = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "submit";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-left w3-hover-none w3-hover-border-none w3-large button_read";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "button_read";
                        button_read.setAttributeNode(att);
                        //New 1.1v:- not transfering to enter_marks.php page
                        var att = document.createAttribute("onclick");
                        att.value = "return true";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_alloted_button_read";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "MARK AS READ";
                        button_read.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read);

                        //DOUBLE TICK FOR MARK AS READ BUTTON FONT AWESOME ICON
                        /*var button_read_tick_span = document.createElement("SPAN");
                        var att = document.createAttribute("class");
                        att.value = "fa fa-check fa-2x w3-right button_read_tick_span";
                        button_read_tick_span.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read_tick_span);*/

                        //DOUBLE TICK FOR MARK AS READ BUTTON 
                        var button_read_tick = document.createElement("IMG");
                        var att = document.createAttribute("src");
                        att.value = "../icons/blue single tick.png";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("width");
                        att.value = "30px";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("height");
                        att.value = "36px";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-right button_read_tick";
                        button_read_tick.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read_tick);

                        //hidden input element containing (id value of form)
                        var form_id = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "form_" + m;
                        form_id.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(form_id);

                        //hidden input element containing (type of exam)
                        var button_exam_type = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].notification;
                        button_exam_type.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_exam_type);

                        //hidden input element containing (subject batch no)
                        var button_subject_batch_no = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_batch_no;
                        button_subject_batch_no.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_batch_no);

                        //hidden input element containing (class batch no)
                        var button_batch_no = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].batch_no;
                        button_batch_no.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_batch_no);

                        //hidden input element containing (subject name)
                        var button_subject_name = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_name;
                        button_subject_name.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_name);

                        //hidden input element containing (subject short name)
                        var button_subject_short_name = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_short_name;
                        button_subject_short_name.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_short_name);

                        //hidden input element containing (subject code)
                        var button_subject_code = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_code;
                        button_subject_code.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_code);

                        //hidden input element containing (total no of subjects teacher is taking)
                        var button_total_no_of_subjects = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].count;
                        button_total_no_of_subjects.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_total_no_of_subjects);
                    }
                    else{
                        //outer box for button:-it will contain a message and button
                        var button_bar = document.createElement("DIV");
                        var att = document.createAttribute("class");
                        att.value = "w3-display-container button_bar";
                        button_bar.setAttributeNode(att);
                        document.getElementsByClassName("msg_body")[m].appendChild(button_bar);

                        //button form
                        var button_form = document.createElement("FORM");
                        var att = document.createAttribute("method");
                        att.value = "post";
                        button_form.setAttributeNode(att);
                        //Earlier we were refering to ut_term_pracs_th.php page now we will directly transfer to enter_marks.php page
                        //we will perform action by clicking the ENTER MARKS button
                        /*var att = document.createAttribute("action");
                        att.value = "../php/ut_term_pracs_th.php";
                        button_form.setAttributeNode(att);*/
                        var att = document.createAttribute("class");
                        att.value = "w3-container button_form";
                        button_form.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        //att.value = "form_"+m;
                        att.value = "form_id";
                        button_form.setAttributeNode(att);
                        var att = document.createAttribute("enctype");
                        att.value = "multipart/form-data";
                        button_form.setAttributeNode(att);
                        document.getElementsByClassName("button_bar")[m].appendChild(button_form);

                        //button_main
                        var button_main = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "submit";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-hide w3-hover-none w3-left w3-large button_main";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = data[0].count - m;
                        //att.value = "exam_marks";
                        button_main.setAttributeNode(att);
                        //New 1.1v:- not transfering to enter_marks.php page
                        var att = document.createAttribute("onclick");
                        att.value = "return false";
                        //att.value = "submit_function(this)";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        //att.value = data[0].count-m;
                        //att.value = "enter_marks";      //to transfer to ut_term_pracs_th.php page V1.0               
                        att.value = "exam_marks";
                        button_main.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "";
                        button_main.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_main);

                        //MARK READ CONTAINER
                        var mark_read_container = document.createElement("DIV");
                        var att = document.createAttribute("class");
                        att.value = "w3-bar-item w3-right mark_read_container";
                        mark_read_container.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(mark_read_container);

                        //MARK AS READ BUTTON
                        var button_read = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "submit";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-left w3-hover-none w3-hover-border-none w3-large button_read";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "button_read";
                        button_read.setAttributeNode(att);
                        //New 1.1v:- not transfering to enter_marks.php page
                        var att = document.createAttribute("onclick");
                        att.value = "return false";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "button_read";
                        button_read.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "READ";
                        button_read.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read);

                        //DOUBLE TICK FOR MARK AS READ BUTTON FONT AWESOME ICON
                        /*var button_read_tick_span = document.createElement("SPAN");
                        var att = document.createAttribute("class");
                        att.value = "fa fa-check-double fa-2x w3-right button_read_tick_span";
                        button_read_tick_span.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read_tick_span);*/

                        //DOUBLE TICK FOR MARK AS READ BUTTON 
                        var button_read_tick = document.createElement("IMG");
                        var att = document.createAttribute("src");
                        att.value = "../icons/blue double tick.png";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("width");
                        att.value = "30px";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("height");
                        att.value = "37px";
                        button_read_tick.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-right button_read_tick";
                        button_read_tick.setAttributeNode(att);
                        document.getElementsByClassName("mark_read_container")[m].appendChild(button_read_tick);

                        //hidden input element containing (id value of form)
                        var form_id = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "form_id";
                        form_id.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = "form_" + m;
                        form_id.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(form_id);

                        //hidden input element containing (type of exam)
                        var button_exam_type = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "exam_type";
                        button_exam_type.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].notification;
                        button_exam_type.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_exam_type);

                        //hidden input element containing (subject batch no)
                        var button_subject_batch_no = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_batch_no";
                        button_subject_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_batch_no;
                        button_subject_batch_no.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_batch_no);

                        //hidden input element containing (class batch no)
                        var button_batch_no = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "batch_no";
                        button_batch_no.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].batch_no;
                        button_batch_no.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_batch_no);

                        //hidden input element containing (subject name)
                        var button_subject_name = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_name";
                        button_subject_name.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_name;
                        button_subject_name.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_name);

                        //hidden input element containing (subject short name)
                        var button_subject_short_name = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_short_name";
                        button_subject_short_name.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_short_name;
                        button_subject_short_name.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_short_name);

                        //hidden input element containing (subject code)
                        var button_subject_code = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "subject_code";
                        button_subject_code.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].message[i].subject_code;
                        button_subject_code.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_subject_code);

                        //hidden input element containing (total no of subjects teacher is taking)
                        var button_total_no_of_subjects = document.createElement("INPUT");
                        var att = document.createAttribute("type");
                        att.value = "hidden";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("class");
                        att.value = "w3-button w3-hide button_total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("id");
                        att.value = "total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("name");
                        att.value = "total_no_of_subjects";
                        button_total_no_of_subjects.setAttributeNode(att);
                        var att = document.createAttribute("value");
                        att.value = data[0].count;
                        button_total_no_of_subjects.setAttributeNode(att);
                        document.getElementsByClassName("button_form")[m].appendChild(button_total_no_of_subjects);
                    }
                    //message counter increment
                    m++;
                }
            }
        };
        xhttp.open("POST", "./staff_notification.inc.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fname=Henry&lname=Ford");

        setTimeout(notify, 1000);
    }
    notify();
</script>
<?php if(isset($_POST['exam_marks'])){
    $_SESSION['batch_no'] = $_POST['batch_no'];
	$_SESSION['subject_batch_no'] = $_POST['subject_batch_no'];
	$_SESSION['subject_name'] = $_POST['subject_name'];
	$_SESSION['subject_short_name'] = $_POST['subject_short_name'];
    $_SESSION['subject_code'] = $_POST['subject_code'];
    $_SESSION['exam_type'] = $_POST['exam_type'];

    //changing the notification msg from not viewed to viewed
    $branch = $_SESSION['branch'];
    $curr_year = date("Y");
    //folder containing json files which stores notification to staff about sem activated
    $file = "../files/notifications_for_staff/notification_for_exam_link_activation_by_hod_per_year/".$curr_year."/".$branch."/activate_marks_link.json";

    if(file_exists($file)){
        $file_content = file_get_contents($file);

        $json_data = json_decode($file_content);
        foreach ($json_data as $data) {
            if ($data->uid == $_SESSION['uid']){
                foreach ($data->notification as $notifi) {
                    if($notifi->subject_name==$_POST['subject_name'])
                        $notifi->viewed = "yes";
                }
            }
        }
        file_put_contents($file,json_encode($json_data));
    }
    //header("Location: ../php/enter_marks.php"); //not working
    echo "<script>location.href='../php/enter_marks.php';</script>";
}

if(isset($_POST['button_read'])){
    //changing the notification msg from not viewed to viewed
    $branch = $_SESSION['branch'];
    $curr_year = date("Y");
    //folder containing json files which stores notification to staff about sem activated
    $file = "../files/notifications_for_staff/notification_for_exam_link_activation_by_hod_per_year/".$curr_year."/".$branch."/activate_marks_link.json";

    if(file_exists($file)){
        $file_content = file_get_contents($file);

        $json_data = json_decode($file_content);
        foreach ($json_data as $data) {
            if ($data->uid == $_SESSION['uid']){
                foreach ($data->notification as $notifi) {
                    if($notifi->subject_name==$_POST['subject_name'])
                        $notifi->viewed = "yes";
                }
            }
        }
        file_put_contents($file,json_encode($json_data));
    }
}

if(isset($_POST['subject_alloted_button_read'])){
    //changing the notification msg from not viewed to viewed
    $branch = $_SESSION['branch'];
    $curr_year = date("Y");
    //folder containing json files which stores notification to staff about sem activated
    $file = "../files/notifications_for_staff/notification_for_subjects_alloted_by_hod_per_year/".$curr_year."/".$branch."/subjects_alloted.json";

    if(file_exists($file)){
        $file_content = file_get_contents($file);

        $json_data = json_decode($file_content);
        foreach ($json_data as $data) {
            if ($data->uid == $_SESSION['uid']){
                foreach ($data->notification as $notifi) {
                    if($notifi->subject_name==$_POST['subject_name'])
                        $notifi->viewed = "yes";
                }
            }
        }
        file_put_contents($file,json_encode($json_data));
    }
}
?>