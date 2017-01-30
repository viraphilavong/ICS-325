/**
 * Created by AlexPhilavong on 7/23/2016.
 */
function ajax(id)
{
    var httpxml;
    try
    {
// Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
// Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateChanged()
    {
        if(httpxml.readyState==4)
        {
///////////////////////
//alert(httpxml.responseText);
            var myObject = JSON.parse(httpxml.responseText);
            if(myObject.value.status=='success'){
                var user_id='user_'+myObject.data.id;
                var name_id='name_'+myObject.data.id;
                var password_id='password_'+myObject.data.id;
                var address_id='address_'+myObject.data.id;
                var city_id='city_'+myObject.data.id;
                var state_id='state_'+myObject.data.id;
                var zip_id='zip_'+myObject.data.id;
                var email_id='email_'+myObject.data.id;
                var adminFlag_id='admin_'+myObject.data.id;
                document.getElementById(user_id).innerHTML = myObject.data.mark;
                document.getElementById(name_id).innerHTML = myObject.data.name;
                document.getElementById(password_id).innerHTML = myObject.data.password;
                document.getElementById(address_id).innerHTML = myObject.data.address;
                document.getElementById(city_id).innerHTML = myObject.data.city;
                document.getElementById(state_id).innerHTML = myObject.data.state;
                document.getElementById(zip_id).innerHTML = myObject.data.zip;
                document.getElementById(email_id).innerHTML = myObject.data.email;
                document.getElementById(adminFlag_id).innerHTML = myObject.data.adminFlag;


                document.getElementById("msgDsp").innerHTML=myObject.value.message;
                var sid='s'+myObject.data.id;
                document.getElementById(sid).innerHTML = "<input type=button value='Edit' onclick=edit_field("+myObject.data.id+")>";
                setTimeout("document.getElementById('msgDsp').innerHTML=' '",2000)
            }// end of if status is success
            else {  // if status is not success
                document.getElementById("msgDsp").innerHTML=myObject.value.message;
                document.getElementById("msgDsp").style.borderColor='red';
                setTimeout("document.getElementById('msgDsp').style.display='none'",2000)
            } // end of if else checking status

        }
    }


    var url="display-ajax.php";
    var data_user='data_user'+ id;
    var data_name='data_name'+ id;
    var data_password='data_password'+ id;
    var data_address='data_address'+ id;
    var data_city='data_city'+ id;
    var data_state='data_state'+ id;
    var data_zip='data_zip'+ id;
    var data_email='data_email'+ id;
    var data_adminFlag='data_adminFlag'+ id;



    var user = document.getElementById(data_user).value;
    var name = document.getElementById(data_name).value;
    var password = document.getElementById(data_password).value;
    var address = document.getElementById(data_address).value;
    var city = document.getElementById(data_city).value;
    var state = document.getElementById(data_state).value;
    var zip = document.getElementById(data_zip).value;
    var email = document.getElementById(data_email).value;
    var adminFlag = document.getElementById(data_adminFlag).value;

    var parameters="user=" + user + "&id=" + id + "&name="+name;
    parameters = parameters + "&password=" + password + "&address="+address;
    parameters = parameters + "&city=" + city + "&state="+state;
    parameters = parameters + "&zip=" + zip + "&email="+email + "&adminFlag=" + adminFlag;
//alert(parameters);
    httpxml.onreadystatechange=stateChanged;
    httpxml.open("POST", url, true)
    httpxml.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
//alert(parameters);
    document.getElementById("msgDsp").style.borderColor='#ffffff';
    document.getElementById("msgDsp").style.display = 'inline'
    document.getElementById("msgDsp").innerHTML="Wait .... ";
    httpxml.send(parameters)

////////////////////////////////


}

