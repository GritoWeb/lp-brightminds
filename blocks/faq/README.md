# Bloco ACF: FAQ (Dúvidas Frequentes)

## 📝 Descrição
Bloco para criação de seções de perguntas e respostas frequentes com funcionalidade de acordeão (expandir/recolher). Interface intuitiva e totalmente responsiva.

## 🔧 Recursos
- ✅ Título da seção editável
- ✅ Múltiplas perguntas e respostas
- ✅ Sistema de acordeão (expansão/recolhimento)
- ✅ Animações suaves
- ✅ Design responsivo
- ✅ Ícones indicativos (+/-)
- ✅ Comportamento inteligente (fecha outros ao abrir um)
- ✅ Preview no editor
- ✅ Placeholder quando não configurado

## 📂 Estrutura de Arquivos
```
faq/
├── faq.php             # Template principal do bloco
├── register.php        # Registro do bloco ACF
├── backend.php         # Preview no editor
└── README.md          # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 📋 Configuração Principal
- **Título da Seção:** Título principal do FAQ
  - Padrão: "Dúvidas Frequentes"
  - Tipo: Texto

### ❓ Itens do FAQ
- **Perguntas e Respostas:** Repeater com múltiplos itens
  - **Pergunta:** Campo de texto para a pergunta
  - **Resposta:** Editor de texto rico (WYSIWYG) para resposta detalhada
  - **Quantidade:** Ilimitada de perguntas

## 🎨 Design e Layout

### 📐 Estrutura Visual
- **Container:** Largura total com padding responsivo
- **Título:** Centralizado, fonte grande e negrito
- **Items:** Lista vertical com espaçamento
- **Bordas:** Arredondadas para visual moderno

### 🎯 Estados Visuais
- **Fechado:** Pergunta visível, resposta oculta, ícone "+"
- **Aberto:** Pergunta e resposta visíveis, ícone "-"
- **Hover:** Efeito visual na pergunta
- **Transição:** Animação suave de 300ms

## 📱 Responsividade
- **Desktop:** Layout otimizado para telas grandes
- **Tablet:** Adaptação para telas médias
- **Mobile:** Design compacto para smartphones
- **Touch:** Funcionalidade touch-friendly

## 🚀 Funcionalidades JavaScript

### 🎭 Comportamento do Acordeão
- **Click to Toggle:** Clique para abrir/fechar
- **Auto-close:** Fecha outros itens ao abrir um novo
- **Smooth Animation:** Animação baseada em `scrollHeight`
- **Height Calculation:** Altura dinâmica baseada no conteúdo

### 🔧 Inicialização
```javascript
document.addEventListener('DOMContentLoaded', () => {
    // Seleciona todos os itens FAQ
    const faqItems = document.querySelectorAll('.faq-item');
    
    // Adiciona event listeners
    // Calcula altura dinamicamente
    // Aplica classes de estado
});
```

## 📋 Como Usar

### 🏗️ No Editor
1. Adicione o bloco "FAQ" da categoria "BrightMinds"
2. Configure o título da seção
3. Adicione perguntas e respostas usando o repeater
4. Use o editor WYSIWYG para formatação rica nas respostas
5. Visualize o preview no editor

### 👀 No Frontend
1. FAQ aparece com todas as respostas fechadas
2. Usuário clica na pergunta para expandir
3. Resposta abre com animação suave
4. Outros itens fecham automaticamente
5. Clique novamente para fechar

## 🎨 Classes CSS Aplicadas
```css
.faq-block          /* Container principal */
.faq-item           /* Item individual */
.faq-question       /* Pergunta clicável */
.faq-answer         /* Container da resposta */
.open               /* Estado aberto */
```

## 🔗 Integrações
- **JavaScript externo:** `/js/faq.js` para funcionalidade
- **CSS dos blocos:** Estilos no `blocks.css`
- **Verificações de segurança:** Elementos validados antes de uso
- **Fallbacks:** Mensagens quando não configurado

## ⚠️ Recursos de Segurança
- **Verificação ABSPATH:** Previne acesso direto ao arquivo
- **Sanitização:** Todos os outputs são sanitizados
- **Verificação de elementos:** JavaScript verifica existência antes de usar
- **Fallback graceful:** Comportamento seguro quando elementos não existem

## 🎯 Casos de Uso Ideais
- **Seção de dúvidas** em landing pages
- **FAQ de produtos** em páginas de vendas
- **Suporte ao cliente** em sites institucionais
- **Perguntas frequentes** em qualquer contexto
- **Documentação** organizada por tópicos

## 📊 Performance
- **Lazy JavaScript:** Carrega apenas quando necessário
- **CSS mínimo:** Estilos otimizados
- **Animações eficientes:** Usando CSS transforms
- **SEO friendly:** Conteúdo indexável pelos mecanismos de busca
