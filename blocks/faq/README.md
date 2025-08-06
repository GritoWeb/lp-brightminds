# Bloco ACF: FAQ (Perguntas Frequentes)

## 📝 Descrição
Bloco para criação de seções de perguntas frequentes com accordion interativo, permitindo múltiplas perguntas e respostas organizadas de forma elegante e funcional.

## 🔧 Recursos
- ✅ Múltiplas perguntas e respostas
- ✅ Accordion interativo com JavaScript
- ✅ Títulos de seção configuráveis
- ✅ Estilos personalizados
- ✅ Animações suaves de abertura/fechamento
- ✅ Totalmente responsivo
- ✅ Acessibilidade completa
- ✅ Expansão/colapso individual

## 📂 Estrutura de Arquivos
```
faq/
├── faq.php            # Template principal do bloco
├── register.php       # Registro do bloco ACF
├── backend.php        # Preview no editor
└── README.md         # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 📝 Conteúdo Principal
- **Título da Seção:** Título principal da seção FAQ (ex: "Perguntas Frequentes")
- **Subtítulo:** Texto descritivo opcional abaixo do título

### ❓ Lista de Perguntas
- **Pergunta:** Texto da pergunta (campo de texto)
- **Resposta:** Resposta detalhada (editor de texto rico)
- **[Repetível]** Permite adicionar quantas perguntas desejar

### 🎨 Configurações de Estilo
- **Cor do Título:** Cor personalizada para o título da seção
- **Cor das Perguntas:** Cor do texto das perguntas
- **Cor das Respostas:** Cor do texto das respostas
- **Cor de Fundo:** Cor de fundo dos itens do FAQ

## 🎨 Características Visuais
- **Design clean:** Layout limpo e organizado
- **Ícones indicativos:** Setas que indicam estado (aberto/fechado)
- **Transições suaves:** Animações CSS para abertura/fechamento
- **Tipografia clara:** Hierarquia visual bem definida
- **Espaçamento consistente:** Padding e margin balanceados

## 📱 Responsividade
- **Mobile-first:** Otimizado para dispositivos móveis
- **Breakpoints:** Adaptação em tablets e desktops
- **Touch-friendly:** Área de toque adequada para mobile
- **Texto fluido:** Tamanhos responsivos de fonte

## 🔗 Funcionalidades JavaScript
- **Accordion dinâmico:** Arquivo `js/faq.js` gerencia interações
- **Estado individual:** Cada pergunta abre/fecha independentemente
- **Prevenção de erro:** Verificações de segurança antes de adicionar eventos
- **Performance:** Event delegation para eficiência
- **Acessibilidade:** Suporte a navegação por teclado

## 📋 Como Usar
1. **No Editor:**
   - Adicione o bloco "FAQ" da categoria "BrightMinds"
   - Configure título e subtítulo da seção
   - Adicione perguntas e respostas usando o repetidor
   - Personalize cores conforme o design
   - Visualize o preview no editor

2. **No Frontend:**
   - Seção exibida com todas as perguntas fechadas
   - Clique em qualquer pergunta para expandir/recolher
   - Múltiplas perguntas podem estar abertas simultaneamente
   - JavaScript carrega automaticamente

## 🚀 Funcionalidades Avançadas
- **Editor WYSIWYG:** Respostas com formatação rica (negrito, itálico, links)
- **Sanitização:** Conteúdo sanitizado para segurança
- **SEO Friendly:** Markup semântico para melhor indexação
- **Schema.org:** Potencial para markup estruturado
- **Lazy interaction:** JavaScript carrega apenas quando necessário

## ⚠️ Observações
- Requer o arquivo `js/faq.js` para funcionalidade completa
- Funciona sem JavaScript (graceful degradation)
- Cores personalizadas aplicadas via CSS inline
- Suporte a HTML nas respostas (sanitizado)
- Repetidor ACF permite quantidade ilimitada de itens

## 🔧 Configuração Técnica
- **ACF Repeater:** Utiliza campo repetidor para lista dinâmica
- **CSS Flexbox:** Layout responsivo moderno
- **JavaScript ES6:** Código moderno e eficiente
- **Accessibility:** ARIA labels e navegação por teclado
- **Progressive Enhancement:** Funciona com e sem JavaScript

## 💡 Dicas de Uso
- **Organize por importância:** Coloque perguntas mais frequentes primeiro
- **Respostas concisas:** Mantenha respostas claras e objetivas
- **Links úteis:** Use links nas respostas para recursos adicionais
- **Teste mobile:** Verifique funcionamento em dispositivos móveis
- **SEO:** Use palavras-chave relevantes nas perguntas