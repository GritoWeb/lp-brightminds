<div id="whatsappForm" class="fixed bottom-24 right-4 w-[400px] bg-white rounded-lg shadow-lg hidden">
  <div class="bg-[#0F5F54] text-white px-4 py-4 rounded-t-lg flex justify-between items-center">
    <span class="font-semibold">Contato via WhatsApp</span>
    <button id="closeWhatsappForm" class="text-white text-xl">&times;</button>
  </div>
  <div>
    <form class="space-y-3">
      <div class="bg-[#E9E4DE] p-4 py-8 space-y-2 text-right">
        <div class="flex items-center space-x-2">
          <label class="block text-sm font-semibold min-w-[80px]">Nome:</label>
          <input type="text" placeholder="Digite o seu nome" class="flex-1 rounded-lg border px-2 py-3 bg-white">
        </div>
        <div class="flex items-center space-x-2 text-right">
          <label class="block text-sm font-semibold min-w-[80px]">WhatsApp:</label>
          <input type="tel" placeholder="(00) 00000-0000" class="flex-1 rounded-lg border px-2 py-3 bg-white">
        </div>
        <div class="flex items-center space-x-2 text-right">
          <label class="block text-sm font-semibold min-w-[80px]">E-mail:</label>
          <input type="email" placeholder="seu-email@provedor.com" class="flex-1 rounded-lg border px-2 py-3 bg-white">
        </div>
      </div>
      <div class="bg-white p-2 rounded-b-xl">
        <div class="flex items-center space-x-2 mb-2">
          <input type="checkbox" id="consent">
          <label for="consent" class="text-xs">Eu concordo em receber comunicações e ofertas de acordo com o meu interesse.</label>
        </div>
        <button type="submit" id="submitBtn" disabled class="w-full bg-gray-400 text-white py-2 rounded cursor-not-allowed">
          Iniciar uma conversa
        </button>
      </div>
    </form>
  </div>
</div>
