$(document).ready(function () {
            /* Let's get subject */
            $.getJSON("../classes/get_subjects.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#subjects").append("<option value=" + value.subject_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get subject */

            /* Let's get the test */
            $.getJSON("../classes/get_tests.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#tests").append("<option value=" + value.test_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get test */

            /* Let's get classes */
            $.getJSON("../classes/get_classes.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#classes").append("<option value=" + value.class_id + ">" + value.name + "</option>");
                    $("#classes1").append("<option value=" + value.class_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get classes */

            /* Let's get arms */
            $.getJSON("../classes/get_arms.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#arms").append("<option value=" + value.arm_id + ">" + value.name + "</option>");
                    $("#arms1").append("<option value=" + value.arm_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get arms */

            /* Let's get sessions */
            $.getJSON("../classes/get_sessions.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#sessions").append("<option value=" + value.session_id + ">" + value.year + "</option>");
                });
            });
            /* End of let's get sessions */


            /* Let's get term */
            $.getJSON("../classes/get_terms.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#terms").append("<option value=" + value.term_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get term */

        });
