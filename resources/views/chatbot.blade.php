@extends('layouts.app')

@section('content')
<h1>🤖 Chat with AbdouX</h1>

<div id="chat-box" style="background:#fff;padding:15px;height:300px;overflow-y:auto;border:1px solid #ccc;margin-bottom:10px;"></div>

<input type="text" id="message"
       placeholder="Ask me about my skills or projects..."
       style="width:80%;padding:8px;">

<button onclick="sendMessage()">Send</button>

<script>
function sendMessage() {
    const input = document.getElementById('message');
    const message = input.value.trim();
    if (!message) return;

    const chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += `<p><strong>You:</strong> ${message}</p>`;

    fetch('/api/chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message })
    })
    .then(res => res.json())
    .then(data => {
        chatBox.innerHTML += `<p><strong>AbdouX:</strong> ${data.reply}</p>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    })
    .catch(() => {
        chatBox.innerHTML += `<p style="color:red;">Server error</p>`;
    });

    input.value = '';
}
</script>
@endsection
