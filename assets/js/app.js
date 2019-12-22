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
$("div[id^='q-'").css('display', 'none');
$("#q-1").toggle()
var n = 1;
$('#signup_form input[type=radio]').change(function(){
    $('#q-'+ n).toggle();
    n++;
    $('#q-'+ n).toggle();
    console.log(n)
})
$('#next').click(function(){
    
})


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
                        <input type="radio" name="his_gender" value="female" id="" onChange={this.handleChecked}/>
                        <label htmlFor="female">une femme</label>
                        <input type="radio" name="his_gender" value="genderqueer" id="" onChange={this.handleChecked}/>
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
