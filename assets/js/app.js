/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

import React from 'react';
import ReactDOM from 'react-dom';
class App extends React.Component {
    render() {
        return (
            <div>
                <form id="search_form" action="">
                    <h2>Je souhaite rencontrer</h2>
                    <input type="radio" name="his_gender" value="male" id="" />
                    <label htmlFor="male">un homme</label>
                    <input type="radio" name="his_gender" value="female" id="" />
                    <label htmlFor="male">une femme</label>
                    <input type="radio" name="his_gender" value="genderqueer" id="" />
                    <label htmlFor="male">Peu importe</label>
                </form>
                <form id="mygender_form" action="">
                    <h2>Je suis</h2>
                    <input type="radio" name="my_gender" value="male" id="" />
                    <label htmlFor="male">un homme</label>
                    <input type="radio" name="my_gender" value="female" id="" />
                    <label htmlFor="male">une femme</label>
                    <input type="radio" name="my_gender" value="genderqueer" id="" />
                    <label htmlFor="male">Non binaire</label>
                </form>
                <form id="mycity_form" action="">
                    <h2>Ma ville</h2>
                    <input type="text" name="city" id=""/>
                </form>
                <form id="myfirstname_form" action="">
                    <h2>Mon prénom</h2>
                    <input type="text" name="firstname" id=""/>
                </form>

            </div>
        )
    }
}
ReactDOM.render(<App />, document.getElementById('root'));