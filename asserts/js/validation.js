 $('#email_log, #password_log',).focus(function(){
    $(this).addClass("border border-success").removeClass("border border-danger");
});
 
$('#email_log').on('click', function () {
    $('#message').text('You have to enter the email.').addClass("text-success");
});

$('#password_log').on('click', function () {
    $('#message1').text('You have to enter the email.').addClass("text-success");
});

function setSuccess(input)
                {
                    const formc = input.parent();
                    const small = input.next('small');
                    const a = small.next('a');
                    small.text(null).removeClass();
                    $(input).addClass("border border-success").removeClass("border border-danger")
                    a.text("done").addClass("bi bi-check-circle-fill text-success");
                    $("button").addClass("btn-success").removeClass("btn-danger");
                    
                }  
function setError(input,message)
                {
                const formc = input.parent()
                const small = input.next('small')
                const a = small.next('a')
                small.text(message).addClass("bi bi-x-circle-fill ");
                a.text("").removeClass();
                input.addClass("border border-danger").removeClass("border border-success");
                $("button").addClass("btn-danger").removeClass("btn-primary");
                $("#hearder").addClass("text-danger").removeClass("text-success");
                $("#para").addClass("text-danger").removeClass("text-success");
                $('#password_log').on('click', function () {
                    $('#message1').text('You have to enter the email.').addClass("text-success");
                });             
}   
class Login {

            constructor() {
                this.firstname = $("#first_name");
                this.lastname = $("#last_name")
                this.gmail = $("#email");
                this.password = $("#password1");
                this.cpassword = $("#cpassword1");
                
            }
            firstnamecheck(){
                var firstname = this.firstname.val().trim();
                if ( firstname === "") 
                {
                setError( this.firstname, " Please enter your FirstName." ) 
                
                return false;
                }
                else
                {
                setSuccess(this.firstname);
                return true;
                }
            }
            lastnamecheck(){
                var lastname = this.lastname.val().trim();
                if ( lastname === "") 
                {
                setError( this.lastname, " Please enter your lastname." ) 
                return false;
                }
                else
                {
                setSuccess(this.lastname);
                return true;
                }
            }

            gmailcheck(){
                var gmailcheck = this.gmail.val().trim();
                if (gmailcheck === "")
                {
                setError( this.gmail, " Please enter your Gmail " )
                return false;
                }
                else
                {
                setSuccess(this.gmail);
                return true;
                }
            }
            passwordscheck(){
                var passwordvalue = this.password.val().trim();
                var cpasswordvalue = this.cpassword.val().trim();
                if (passwordvalue === "")
                {
                setError( this.password, " Please enter your Password" ) 
                return false;
                }
                else
                {
                    setSuccess(this.password) ;
                    
                }

                if (cpasswordvalue === "" ) 
                {
                setError( this.cpassword, " Please enter your password " ) 
                return false;
                }
                else if( passwordvalue  !== cpasswordvalue ){
                setError( this.cpassword , " Please enter your  SAME Password" )
                return false;
                }
                else
                {
                setSuccess (this.cpassword);
                   
                }
                 return true;
            }
            
            validation(){
                let isvalid = true;
                    if (!this.firstnamecheck()) {
                            isvalid = false;   
                        }
                        if (!this.lastnamecheck()) {
                            isvalid = false;
                        }if (!this.gmailcheck()) {
                            isvalid = false;
                        }if (!this.passwordscheck()) {
                            isvalid = false;
                        }
                        return isvalid;
                    }
            

}
class already_login {
    constructor() {
        this.gmail = $("#email_log");
        this.password = $("#password_log");
    }   

     gmailcheck(){
                var gmailcheck = this.gmail.val().trim();
                if (gmailcheck === "")
                {
                setError( this.gmail, " Please enter your Gmail " )
                return false;
                }
                else
                {
                setSuccess(this.gmail);
                return true;
                }

            } 
    passwordscheck(){
                var passwordvalue = this.password.val().trim();
                if (passwordvalue === "")
                {
                setError( this.password, " Please enter your Password" ) 
                return false;
                }
                else
                {
                    setSuccess(this.password) ;
                    return true;
                }
    }
    validation(){
        let isvalid = true;
        if (!this.gmailcheck()) {
            isvalid = false;
        }if (!this.passwordscheck()) {
            isvalid = false;
        }
        return isvalid;
    }
}

let login = new Login();
let alreadylogin = new already_login();
$("#form").on("submit", function(e) {
    e.preventDefault(); 
    let result = login.validation();
   
    if (result == true) {
        this.submit(); 
        
    }
      
    
});


$("#loginForm").on("submit", function(e) {
    e.preventDefault(); 
    let result = alreadylogin.validation();

    if (result == true) {
        this.submit(); 
        
    }

});
