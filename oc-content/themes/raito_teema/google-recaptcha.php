<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */


    if( osc_recaptcha_public_key() ) {

    ?>

        <script type="text/javascript">
            var RecaptchaOptions = {
                theme : 'custom',
                custom_theme_widget: 'recaptcha_widget'
            };
        </script>

        <style type="text/css">
            div#recaptcha_widget, div#recaptcha_image > img { width:280px; }
        </style>

        <div id="recaptcha_widget">

            <div id="recaptcha_image"><img /></div>

            <input type="text" placeholder="<?php _e('Enter the words above',raito_teema_THEME_FOLDER); ?>" id="recaptcha_response_field" name="recaptcha_response_field" />

        </div>
        <br>

<?php

    }

    osc_show_recaptcha(); ?>