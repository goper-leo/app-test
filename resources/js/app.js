
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

// components
import PassersList from './components/Home/PassersList';

class App
{
    constructor()
    {

        /**
         * Vue instance
         *
         * @type {Vue}
         * @author goper
         */
        this.vm = new Vue({

            el: '#app',

            /**
             * Mixins
             */
            mixins: [

            ],

            /**
             * Components
             *
             * @type {Object}
             * @author {goper}
             */
            components: {
              PassersList,
            },

            /**
             * Methods
             */
            methods: {


            },

            /**
             * Created hook
             */
            created()
            {
              // Fetch

            },

            /**
             * Mounted hook
             */
            mounted()
            {

            }

        });
    }
}

// Instantiate!
new App();
