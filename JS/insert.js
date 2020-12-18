$(document).ready(function() {


    String.prototype.pick_random = function(minimum, maximum) {
        var nn, ch = '';
        if (typeof maximum === 'undefined') {
            nn = minimum;
        } else {
            nn = minimum + Math.floor((maximum - minimum + 1) * Math.random());
        }
        for (var j = 0; j < nn; j++) {
            ch += this.charAt(Math.floor(this.length * Math.random()));
        }
        return ch;
    };

    String.prototype.shuffle_char = function() {
        var arr = this.split('');
        var t, curent, top_char = arr.length;

        if (top_char)
            while (--top_char) {
                curent = Math.floor((top_char + 1) * Math.random());
                t = arr[curent];
                arr[curent] = arr[top_char];
                arr[top_char] = t;
            }

        return arr.join('');
    };

    let special_character = '!@#$%^&*()_+{}:"<>?\|[];\',./`~';
    let lowercase_character = 'abcdefghijklmnopqrstuvwxyz';
    let uppercase_character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let num_character = '0123456789';

    let all_char = special_character + lowercase_character + uppercase_character + num_character;



    $("#button").click(function(e) {
        e.preventDefault();

        let pass = '';
        pass += special_character.pick_random(1);
        pass += lowercase_character.pick_random(1);
        pass += uppercase_character.pick_random(1);
        pass += all_char.pick_random(4, 11);
        pass = pass.shuffle_char();

        $("#password").val(pass);
        $("#repeat").val(pass);
    });


    $("#visibility_check").click(function(e) {
        e.preventDefault();


        if ($("#password").attr('type') == "password") {
            $("#password").attr('type', "text");
            $("#repeat").attr('type', "text");
            $("#visibility_check").css({ background: "rgb(11, 179, 151)", color: "white" });
        } else {
            $("#password").attr('type', "password");
            $("#repeat").attr('type', "password");
            $("#visibility_check").css({ background: "white", color: "rgb(11, 179, 151)" });

        }

    });





});