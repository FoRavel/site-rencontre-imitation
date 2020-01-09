/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
global.$ = global.jQuery = $;
/*
$('#next').click(function () {

})
$("label[for^='user_meet_']").hover(function () {

}, function () {

})*/


//   $(document).ready(function(){
//     $('.datepicker').datepicker();
//   });

$("div[id^='q-']").css('display', 'none');
$("#q-1").toggle()
var n = 1;
$('#signup_form input[type=radio]').change(function () {
    $('#q-' + n).toggle();
    n++;
    $('#q-' + n).toggle();
})

handleRB();
handleSubmit();

$("input[id^='user_inRelationship_1'").change(function () {
    $("label[for^='user_inRelationship_1'").addClass("btn-large-bubble__choiced");
    $("label[for^='user_inRelationship_0'").removeClass("btn-large-bubble__choiced");
})
$("input[id^='user_inRelationship_0'").change(function () {
    $("label[for^='user_inRelationship_0'").addClass("btn-large-bubble__choiced");
    $("label[for^='user_inRelationship_1'").removeClass("btn-large-bubble__choiced");
})

//TODO Replace display by opacity
function showTheQuestion(n) {
    $("div[id^='q-']").css('display', 'none');
    $("#q-" + n).toggle();
}

function appendQuestionInChat(n) {
    var label = $("#q-" + n + " > p").html();
    $(".chat").append("<p class='padding-20-30 bg-pink rounded fit-content white-text'>"+ label+"</p>");
}

//Add focus style and confirmation radio choice with spacebar
function handleRB() {
    $("label[for^='user_Gender_']").focus(function () {
        $(this).addClass("focused");
        $(this).keypress(function () {
            if (event.which == 32) {
                if ($(this).attr("for") == "user_Gender_0") {
                    $("#user_Gender_0").change()
                } else
                    if ($(this).attr("for") == "user_Gender_1") {
                        $("#user_Gender_1").change()
                    } else
                        if ($(this).attr("for") == "user_Gender_2") {
                            $("#user_Gender_2").change()
                        }
            }
        })
    })
    $("label[for^='user_inRelationship_']").focus(function () {
        $(this).addClass("focused");
        $(this).keypress(function () {
            if (event.which == 32) {
                if ($(this).attr("for") == "user_inRelationship_0") {
                    $("#user_inRelationship_0").change()
                } else
                    if ($(this).attr("for") == "user_inRelationship_1") {
                        $("#user_inRelationship_1").change()
                    }
            }
        })
    })

    $("label[for^='user_meet_']").focusout(function () {
        $(this).removeClass("focused");
    })

    $("label[for^='user_Gender_']").focusout(function () {
        $(this).removeClass("focused");

    })



}

function handleSubmit() {

    var btn = null;

    $(".submit-field").on("click change", function (e) {
        btn = $(this);
        $("#signup_form").submit();

    })  

    $("#signup_form").on("submit", function (e) {
        var questionNumber = btn.attr('data-id');
        console.log(questionNumber)
        e.preventDefault();
        var $form = $(e.currentTarget);
        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize() + "&q=" + questionNumber,
            success: function (data) {
                $form.closest('.wrapper-form').html(data);
                handleSubmit();
                handleRB();
                showTheQuestion($("#test").attr('data-id'));
                appendQuestionInChat($("#test").attr('data-id'));
            },
            error: function (error) {
                console.log(error)
            }
        });
    })
}





import React from 'react';
import ReactDOM from 'react-dom';
class App extends React.Component {
    constructor(props) {
        super(props);

    }

    handleChecked() {
        alert("test");
    }

    render() {
        return (
            <div>
                <form action="">
                    <h1>Étape 1:</h1>
                    <div id="looking-for" display="1">
                        <h2>Je souhaite rencontrer</h2>
                        <input type="radio" name="his_gender" value="male" id="" onChange={this.handleChecked} />
                        <label htmlFor="male">un homme</label>
                        <input type="radio" name="his_gender" value="female" id="" onChange={this.handleChecked} />
                        <label htmlFor="female">une femme</label>
                        <input type="radio" name="his_gender" value="genderqueer" id="" onChange={this.handleChecked} />
                        <label htmlFor="genderqueer">Peu importe</label>
                    </div>
                    <div id="my-gender">
                        <h2>Je suis</h2>
                        <input type="radio" name="my_gender" value="male" id="" />
                        <label htmlFor="male">un homme</label>
                        <input type="radio" name="my_gender" value="female" id="" />
                        <label htmlFor="male">une femme</label>
                        <input type="radio" name="my_gender" value="genderqueer" id="" />
                        <label htmlFor="male">Non binaire</label>
                    </div>
                    <div id="my-city">
                        <h2>Ma ville</h2>
                        <input type="text" name="city" id="" />
                    </div>
                    <div id="my-firstname">
                        <h2>Mon prénom</h2>
                        <input type="text" name="firstname" id="" />
                    </div>
                    <h1>Étape 2:</h1>
                    <div id="serious">
                        <h2>Etes-vous prêt à vous engager dans une relation sérieuse</h2>
                        <input type="text" name="firstname" id="" />
                    </div>
                </form>
            </div>
        )
    }
}
