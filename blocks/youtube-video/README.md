# Bloco ACF: YouTube Video

## 📝 Descrição
Bloco para incorporação de vídeos do YouTube com thumbnail personalizada que carrega o vídeo apenas quando clicado, otimizando performance da página.

## 🔧 Recursos
- ✅ URL do YouTube configurável (watch, embed ou youtu.be)
- ✅ Thumbnail personalizada
- ✅ Dimensões customizáveis (desktop e mobile)
- ✅ Carregamento lazy (só carrega quando clicado)
- ✅ Botão play personalizado
- ✅ Design responsivo
- ✅ Acessibilidade com teclado
- ✅ Autoplay quando ativado
- ✅ Suporte a YouTube no-cookie

## 📂 Estrutura de Arquivos
```
youtube-video/
├── youtube-video.php    # Template principal do bloco
├── register.php         # Registro do bloco ACF
├── backend.php          # Preview no editor
└── README.md           # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 🎬 Conteúdo
- **URL do YouTube:** URL completa do vídeo (watch, embed ou youtu.be)
  - Exemplo: `https://www.youtube.com/watch?v=1MotoMgiWVU`
  - Padrão: `https://www.youtube.com/watch?v=1MotoMgiWVU`

### 🖼️ Aparência
- **Imagem Thumbnail:** Imagem de preview personalizada
  - Formato: Array ACF com URL, alt, etc.
  - Padrão: `/wp-content/uploads/2025/07/thumb-video.webp`

### 📐 Dimensões
- **Largura (Desktop):** Largura em pixels para desktop
  - Padrão: 560px
  - Mínimo: 300px, Máximo: 1920px
- **Altura (Desktop):** Altura em pixels para desktop
  - Padrão: 315px
  - Mínimo: 200px, Máximo: 1080px
- **Altura (Mobile):** Altura em pixels para mobile
  - Padrão: 200px
  - Mínimo: 150px, Máximo: 500px

## 🎨 Design e Layout
- **Container:** Responsivo com largura máxima configurável
- **Aspecto:** Mantém proporções configuradas
- **Bordas:** Arredondadas (border-radius: 24px)
- **Foco:** Borda azul para acessibilidade
- **Transições:** Suaves (300ms) para interações

## 📱 Responsividade
- **Desktop:** Dimensões configuradas no backend
- **Mobile:** Altura específica, largura 100%
- **Mínimo:** 280px de largura em mobile
- **Máximo:** Não excede largura configurada

## 🎯 Funcionalidades

### ▶️ Player Interativo
- **Thumbnail:** Exibida antes do clique
- **Botão Play:** SVG customizado com sombra
- **Ativação:** Click ou teclas Enter/Espaço
- **Autoplay:** Ativado automaticamente após clique

### 🔧 Processamento Inteligente
- **Extração de ID:** Automática de URLs diferentes do YouTube
- **Conversão:** URLs watch/youtu.be convertidas para embed
- **No-cookie:** Usa youtube-nocookie.com para privacidade
- **Fallback:** URLs embed diretas também funcionam

### 🚀 Performance
- **Lazy Loading:** Vídeo só carrega quando solicitado
- **Script Único:** JavaScript específico por bloco
- **CSS Dinâmico:** Estilos baseados nas configurações
- **Otimização:** Menor impacto na velocidade da página

## 📋 Como Usar
1. **No Editor:**
   - Adicione o bloco "YouTube Video" da categoria "BrightMinds"
   - Cole a URL do YouTube
   - Faça upload da thumbnail personalizada
   - Configure as dimensões desejadas
   - Visualize o preview no editor

2. **No Frontend:**
   - Thumbnail é exibida com botão play
   - Clique ou Enter/Espaço para reproduzir
   - Vídeo carrega automaticamente com autoplay

## 🔗 Integrações
- **YouTube API:** Compatível com player embed
- **URLs Suportadas:**
  - `https://www.youtube.com/watch?v=ID`
  - `https://youtu.be/ID`
  - `https://www.youtube.com/embed/ID`
- **No-cookie:** Automaticamente convertido para privacidade

## 🎨 Customizações CSS
```css
/* Estilos aplicados dinamicamente */
#youtube-embed-{ID} {
    width: {configurado}px !important;
    height: {configurado}px !important;
}

/* Responsivo automático */
@media (max-width: 1023px) {
    #youtube-embed-{ID} {
        height: {mobile}px !important;
        width: 100% !important;
    }
}
```

## ⚠️ Observações Importantes
- **IDs únicos:** Cada bloco tem ID específico para CSS isolado
- **Script inline:** JavaScript específico por instância
- **Especificidade:** CSS com `!important` para sobrepor Tailwind
- **Debug:** Comentário HTML temporário para verificar valores
- **Acessibilidade:** Suporte completo a navegação por teclado
- **Privacy:** Usa youtube-nocookie.com por padrão
