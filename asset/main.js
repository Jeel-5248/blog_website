// validation for user registration
$(document).ready(function () {
    $('#register').click(function () {
        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();
        let email = $('#emailAddress').val();
        let password = $('#password').val();
        let age = $('#age').val();
        let gender=$('#gender').val();
      
        if (firstName == '' && lastName == '' && email == '' && password == '' && age == '') {
            $('#error').html('fill all the fields first');
            return false;
        }
       else {
            $('#error').hide();
            let firstname = /^[A-Za-z]{4,}$/;
            let lastname = /^[A-Za-z]{4,}$/;
            let emailRegex=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
            let passwordRegex=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/;


            if(firstName==''){
                $('#first').html('Enter First Name Please');
                return false;
             
            }
            else if (!firstname.test(firstName)) {
                $('#first').html('First Name Must Have Minimum 4 Letter');
                return false;
            }
            else {
                $('#first').hide();
                
            }
       
            if(lastName==''){
                $('#last').html('Enter Last Name Please');
                return false;
                
            }
            else if (!lastname.test(lastName)) {
                $('#last').html('Last Name Must Have Minimum 4 Letter');
                return false;
            }
            else {
                $('#last').hide();
            }
            if(password==''){
                $('#Password').html('Enter Password Please');
                return false;
              
            }
            else if(!passwordRegex.test(password)){
                $('#Password').html('Password Have At Lest One Capital Letter,One Small Leter,1 Digit,1 Special Character and length must be Between 8 to 16');
                return false;
            }
            else{
                $('#Password').hide();
            }
            if(email==''){
                $('#Email').html('Enter Email Please');
                return false;
               
            }
            else if(!emailRegex.test(email)){
                $('#Email').html('Enter Valid email');
                return false;
            }
            else{
                $('#Email').hide();
            }
            if(age==''){
                $('#Age').html('Enter Age Please');
                return false;

            }
            else if(age<10 && age>=100){
                $('#Age').html('your age Must Between 10 to 100')
                return false;
            }
            else{
                $('#Age').hide()
            }
          
       
 
        }
        
    })
})

//user login
$('document').ready(function () {
    $('#Login').click(function () {
        email = $('#email').val();
        password = $('#password').val();

        if (email == '' || password == '') {
            $('#error').html('Enter All The Details First');
            return false;
        }

        else {
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {
                    'action': 'login_data',
                    'email': email,
                    'password': password
                },
                success: function (msg) {
                    if (msg == "success") {
                        window.location.href = SITE_URL + 'PHPOPS/blogwebsite/dashboard.php';
                    }
                    else {
                        $('#error').html('invalid email and password');
                    }
                },
                error: function (error) {
                    console.log(error);
                    //   return false;
                }

            });
        }
    })
})

// admin login
$(document).ready(function () {
    $('#adminLogin').click(function () {
        let username = $('#username').val();
        let password = $('#password').val();
        if (username == '' || password == '') {
            $('#error').html('please fill all the details');
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: {
                    'action': 'admin_login',
                    'username': username,
                    'password': password
                },
                success: function (msg) {
                    if (msg.trim() == 'success') {
                        window.location.href = SITE_URL + 'PHPOPS/blogwebsite/admin/dashboard.php';
                    }
                    else {
                        $('#error').html('your entered username and password are incorrect');
                    }
                },
                error: function (error) {
                    console.log(error);

                }
            })
        }
    })
})

// search in admin dashboard and user dashboard
$("#search").keyup(function () {
        var value = this.value.toLowerCase().trim();
        $("table tr").each(function (index) {
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
});

//search by dropdown in boath admin and user dashboard
$('#category').change(function () {
    $.ajax(
        {
            url: "dashboard.php",
            type: "post",
            data: {
                'action': 'dropdown_data',
                'category':$('#category').val()
            },
            success: function (msg) {
                    $('#detail').html(msg);
            },
            error: function (error) {
                $('#error').html(error);

            }
        }
    );
    
});

// blog content

tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [{
        value: 'First.Name',
        title: 'First Name'
    },
    {
        value: 'Email',
        title: 'Email'
    },
    ],
});

// delete blog
function deleteData(id) {
    if (confirm("You want to delete a data ")) {
        var blog_id = id;
        $.ajax({
            type: 'POST',
            url: 'dashboard.php',
            data: {
                'action': 'delete_data',
                blog_id: blog_id
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    }
    else {
        txt = "You don't want to delete!";
    }

}

// deleteuser
function deleteuser(id) {
    if (confirm("You want to delete user ")) {
        var id = id;
        $.ajax({
            type: 'POST',
            url: 'user_list.php',
            data: {
                'action': 'delete_data',
                    id:id
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    }
    else {
        txt = "You don't want to delete!";
    }

}

// delete category
function deletecategory(category_id) {
    if (confirm("You want to delete category")) {
        var category_id = category_id;
        $.ajax({
            type: 'POST',
            url: 'add_category.php',
            data: {
                'action': 'delete_data',
                    category_id:category_id
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    }
    else {
        txt = "You don't want to delete!";
    }

}




// add content
$('#form').click(function(){
    let blogname=$('#blogname').val();
    let blogtitle=$('#blogtitle').val();
    let blogimage=$('#blogimage').val();

    if(blogname=='' && blogtitle==''&& blogimage==''  && text==''){
        $('#error').html('enter all the details first');
        return false;
    }
    else if (blogname=='') {
        $('#blog_name').html('Enter Blog Name Please');
        return false;
    }
    else if (blogtitle=='') {
        $('#blog_title').html('Enter Blog Title Please');
        return false;
    }
    // else if(blogimage=='') {
    //     $('#blog_image').html('Enter Blog Image Please');
    //     return false;
    // }
    else{
        $('#error').html();
        $('#blog_name').html();
        $('#blog_title').html();
        $('#blog_image').html();
        // return false;
    }

})

// ?search in user dashboard
$("#usersearch").keyup(function () {
    alert('hey')
    // console.log('hello');
    $.ajax(
      {
        url: "dashboard.php",
        type: "post",
        data: {
          'action': 'search_data',
          'search': $('#usersearch').val()
  
  
        },
        success: function (msg) {
        $('#detail').html(msg);

        },
        error: function (error) {
         $('#detail').html(error);
      
        }
      }
    );
  })
