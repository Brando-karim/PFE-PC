@extends('Master')
@section('title', 'WSP ChatBot')
@section('content')
<style>
    /* Chat container styling */
    .chat-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    /* Header styling */
    .chat-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .chat-header i {
        font-size: 2rem;
        color: #4a6fa5;
    }
    
    .chat-header h1 {
        margin: 0;
        color: #2c3e50;
        font-size: 2rem;
    }
    
    /* Input field enhancements */
    .input-group {
        position: relative;
        margin-bottom: 1rem;
    }
    
    .input-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #4a6fa5;
        font-size: 1.2rem;
    }
    
    #userInput {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 12px 20px 12px 45px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #ffffff;
    }
    
    #userInput:focus {
        border-color: #4a6fa5;
        box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.2);
    }
    
    /* Button enhancements */
    .btn-success {
        background: linear-gradient(45deg, #4a6fa5, #6c8ebf);
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        transition: all 0.3s ease;
        margin-top: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    
    .btn-success:hover {
        background: linear-gradient(45deg, #3a5a80, #5a7eaf);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 111, 165, 0.3);
    }
    
    .btn-success i {
        margin-right: 8px;
    }
    
    /* Response area enhancements */
    #response {
        margin-top: 25px;
        padding: 20px;
        background: #ffffff;
        border-radius: 12px;
        border-left: 4px solid #4a6fa5;
        min-height: 100px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.4s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        color: #000000;
    }
    
    #response.show {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Response text styling */
    #response p {
        color: #000000;
        margin-bottom: 1rem;
        line-height: 1.6;
    }
    
    #response code {
        background: #f8f9fa;
        padding: 2px 6px;
        border-radius: 4px;
        color: #000000;
    }
    
    #response pre {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        overflow-x: auto;
        color: #000000;
    }
    
    /* Loading animation */
    .loading-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        padding: 15px 0;
    }
    
    .loading-dots div {
        width: 10px;
        height: 10px;
        background: #4a6fa5;
        border-radius: 50%;
        animation: bounce 1s infinite alternate;
    }
    
    .loading-dots div:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .loading-dots div:nth-child(3) {
        animation-delay: 0.4s;
    }
    
    @keyframes bounce {
        to {
            transform: translateY(-10px);
        }
    }
    
    /* Error message styling */
    .error-message {
        color: #dc3545;
        background: #f8d7da;
        padding: 12px 20px;
        border-radius: 8px;
        border-left: 4px solid #dc3545;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .error-message i {
        font-size: 1.2rem;
    }
</style>

<div class="container chat-container">
    <div class="chat-header">
        <i class="fas fa-robot"></i>
        <h1>AI ChatBot</h1>
    </div>
    
    <div class="input-group">
        <i class="fas fa-comment"></i>
        <input
            type="text"
            class="form-control"
            id="userInput"
            placeholder="Enter your question"
            onkeypress="if(event.keyCode == 13) sendMessage()" />
    </div>
    
    <button class="btn btn-success" onclick="sendMessage()">
        <i class="fas fa-paper-plane"></i>
        Ask!
    </button>
    
    <div id="response"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    async function sendMessage() {
        const input = document.getElementById('userInput').value;
        const responseDiv = document.getElementById('response');
        
        if (!input) {
            responseDiv.innerHTML = `
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    Please enter a message.
                </div>`;
            responseDiv.classList.add('show');
            return;
        }
        
        // Show loading animation
        responseDiv.innerHTML = `
            <div class="loading-dots">
                <div></div>
                <div></div>
                <div></div>
            </div>
        `;
        responseDiv.classList.add('show');
        
        try {
            const response = await fetch(
                'https://openrouter.ai/api/v1/chat/completions',
                {
                    method: 'POST',
                    headers: {
                        Authorization: 'Bearer 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',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        model: 'deepseek/deepseek-r1:free',
                        messages: [{ role: 'user', content: input }],
                    }),
                },
            );
            
            const data = await response.json();
            const markdownText = data.choices?.[0]?.message?.content || 'No response received.';
            
            // Display response with fade-in effect
            responseDiv.innerHTML = marked.parse(markdownText);
            
        } catch (error) {
            responseDiv.innerHTML = `
                <div class="error-message">
                    <i class="fas fa-exclamation-triangle"></i>
                    Error: ${error.message}
                </div>`;
        }
    }
</script>
@endsection