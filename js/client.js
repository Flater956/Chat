$( document ).ready(function () {
    var userName = $("#user_name").text();
    var websocket_server = new WebSocket("ws://localhost:8080/");
    websocket_server.onopen = function (e) {
        websocket_server.send(
            JSON.stringify({
                'type':'socket',
                'userName': $("#user_name").text()
            })
        );
    };
    websocket_server.onerror = function (e) {
        alert('Error');
    }
    $("#disconnect-btn").click(function (){
        websocket_server.send(
            JSON.stringify({
                'type':'disconnect',
                'userName': userName
            })
        );
        window.location = '/';
    });
    websocket_server.onmessage = function (e) {
        var json = JSON.parse(e.data);
        switch (json.type) {
            case 'chat':
                chat(json);
                break;
            case 'socket':
                socket(json);
                break;
            case 'disconnect':
                socket(json);
                break;

        }
    }

    $("#chat_input").on('keyup',function (e) {
        if (e.keyCode == 13 && !e.shiftKey){
            var chat_msg = $(this).val();
            websocket_server.send(
                JSON.stringify({
                    'type':'chat',
                    'chat_msg':chat_msg,
                    'userName': userName
                            })
                        );
            $(this).val('');
        }
    });

});

function chat(json){
    $("#chat_output").append('<br>'+json.msg);
    let maxScroll = $("#chat_output").prop('scrollHeight');
    $("#chat_output").scrollTop(maxScroll);
}

function socket(json){
    let users=json.users;
    $("#chat_users").empty();
    for (let i = 0; i < users.length; i++){
        $("#chat_users").append('<div class="user"> '+users[i]+'</div>');
    }
    $("#chat_output").append('<br>'+json.msg+'<br>');
}

