<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Nhập tin nhắn..."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>

<style>
    .messenger-sendCard {
        position: fixed;
        bottom: 0;
        width: 400px;
        display: flex;
        z-index: 1000;
        background-color: #ffffff;
    }
</style>
