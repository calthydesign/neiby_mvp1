<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIチャットボット</title>
    <style>
        .chat-container {
            height: calc(100vh - 200px);
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">AIチャットボット</h1>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div id="chat-messages" class="chat-container mb-4">
                <!-- メッセージがここに表示されます -->
            </div>
            <form id="chat-form" class="flex">
                <input type="text" id="user-input" class="flex-grow border rounded-l px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="メッセージを入力...">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">送信</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const chatMessages = document.getElementById('chat-messages');
        const chatForm = document.getElementById('chat-form');
        const userInput = document.getElementById('user-input');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = userInput.value.trim();
            if (!message) return;

            // ユーザーのメッセージを表示
            appendMessage('user', message);
            userInput.value = '';

            try {
                // AIの応答を取得
                const response = await axios.post('/api/chat', { message });
                const reply = response.data.reply;

                // AIの応答を表示
                appendMessage('ai', reply);
            } catch (error) {
                console.error('Error:', error);
                appendMessage('ai', 'エラーが発生しました。もう一度お試しください。');
            }
        });

        function appendMessage(sender, text) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `mb-2 ${sender === 'user' ? 'text-right' : 'text-left'}`;
            const innerDiv = document.createElement('div');
            innerDiv.className = `inline-block p-2 rounded-lg ${sender === 'user' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'}`;
            innerDiv.textContent = text;
            messageDiv.appendChild(innerDiv);
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    </script>
</body>
</html>