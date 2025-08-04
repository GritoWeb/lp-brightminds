# Bloco ACF: Nosso Propósito

## 📝 Descrição
Bloco para apresentar a missão, visão ou propósito da empresa/instituição de forma visual e impactante. Combina imagem, textos inspiracionais e call-to-action.

## 🔧 Recursos
- ✅ Imagem de destaque configurável
- ✅ Título principal editável
- ✅ Dois parágrafos de conteúdo
- ✅ Botão de call-to-action
- ✅ Layout responsivo
- ✅ Design visual impactante
- ✅ Backend personalizado
- ✅ Valores padrão inspiracionais

## 📂 Estrutura de Arquivos
```
nosso-proposito/
├── nosso-proposito.php  # Template principal do bloco
├── register.php         # Registro do bloco ACF
├── backend.php          # Interface de configuração
└── README.md           # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 🖼️ Conteúdo Visual
- **Imagem:** Upload de imagem representativa
  - Tipo: Imagem ACF
  - Formato: Array com URL, alt, etc.

### 📝 Conteúdo Textual
- **Título:** Título principal da seção
  - Padrão: "Nosso propósito"
  - Tipo: Texto

- **Parágrafo 1:** Primeiro texto descritivo
  - Padrão: "Inspirar nossos alunos a realizar coisas extraordinárias. E a continuar a aprender por toda a vida."
  - Tipo: Textarea

- **Parágrafo 2:** Segundo texto (citação ou complemento)
  - Padrão: '"What one can be, one must be", Abraham Maslow.'
  - Tipo: Textarea

### 🎯 Call-to-Action
- **Texto do Botão:** Label do botão de ação
  - Padrão: "Quero que meus filhos tenham um futuro brilhante"
  - Tipo: Texto

- **URL do Botão:** Link de destino
  - Padrão: "#"
  - Tipo: URL

## 🎨 Design e Layout

### 📐 Estrutura Visual
- **Layout híbrido:** Combinação de imagem e texto
- **Hierarquia clara:** Título, parágrafos, botão
- **Espaçamento:** Breathing room para legibilidade
- **Alinhamento:** Balanceado e profissional

### 🎯 Elementos Visuais
- **Imagem responsiva:** Adapta-se ao container
- **Tipografia:** Hierarquia clara de textos
- **Botão destacado:** Call-to-action proeminente
- **Cores harmônicas:** Integração com o tema

## 📱 Responsividade
- **Desktop:** Layout lado a lado (imagem + texto)
- **Tablet:** Adaptação para telas médias
- **Mobile:** Layout empilhado (imagem sobre texto)
- **Flexibilidade:** Elementos se ajustam automaticamente

## 🚀 Backend Personalizado

### 🎛️ Interface de Configuração
- **Backend.php:** Interface customizada quando não configurado
- **Formulário estruturado:** Campos organizados logicamente
- **Preview visual:** Representação do resultado final
- **Valores padrão:** Conteúdo inspiracional pré-definido

### 📋 Estados do Bloco
- **Não configurado:** Interface do backend.php
- **Configurado:** Renderização normal do conteúdo
- **Admin vazio:** Mensagem explicativa

## 📋 Como Usar

### 🏗️ No Editor
1. Adicione o bloco "Nosso Propósito" da categoria "BrightMinds"
2. Configure no painel lateral:
   - Faça upload de uma imagem representativa
   - Personalize o título
   - Adapte os parágrafos para sua realidade
   - Configure o texto e URL do botão
3. Visualize o resultado no editor

### 👀 No Frontend
- Seção visualmente impactante
- Imagem e texto harmonizados
- Mensagem inspiracional clara
- Botão para conversão/ação

## 🎨 Estrutura CSS

### 📦 Classes Principais
```css
.nosso-proposito-block   /* Container principal */
.proposito-image         /* Container da imagem */
.proposito-content       /* Container do conteúdo */
.proposito-title         /* Título principal */
.proposito-paragraph     /* Parágrafos de texto */
.proposito-button        /* Botão de call-to-action */
```

### 🎯 Layout Flexível
- **Flexbox/Grid:** Layout moderno e responsivo
- **Adaptive:** Ajuste automático a diferentes telas
- **Proportional:** Elementos proporcionais
- **Balanced:** Equilíbrio visual entre elementos

## 🔗 Integrações
- **WordPress Media Library:** Upload e gestão de imagens
- **ACF Fields:** Campos personalizados estruturados
- **Responsive Images:** Diferentes tamanhos automaticamente
- **SEO Friendly:** Estrutura semântica otimizada

## ⚠️ Recursos de Segurança
- **Verificação ABSPATH:** Previne acesso direto
- **Sanitização:** Todos os outputs são sanitizados
- **Escape de URLs:** Links seguros
- **Conditional Loading:** Backend carregado apenas quando necessário

## 🎯 Estados e Condições

### 🚫 Sem Configuração (Admin)
```php
if (empty(get_field('titulo')) && is_admin()) {
    include_once 'backend.php';
    return;
}
```

### ✅ Configurado
```php
// Renderiza o conteúdo completo
$titulo = get_field('titulo') ?: 'Nosso propósito';
// ... outros campos com fallbacks
```

### 📱 Tratamento de Imagem
```php
if (is_array($imagem)) {
    $imagem_url = $imagem['url'];
    $imagem_alt = $imagem['alt'];
}
```

## 📊 Performance
- **Lazy Loading:** Imagens carregadas sob demanda
- **Semantic HTML:** Estrutura limpa e acessível
- **CSS Otimizado:** Estilos mínimos necessários
- **Responsive Images:** WordPress native responsive

## 🎯 Casos de Uso Ideais
- **Páginas sobre** de empresas e instituições
- **Landing pages** com propósito/missão
- **Sites educacionais** com filosofia pedagógica
- **Páginas institucionais** com valores da empresa
- **Seções inspiracionais** em qualquer contexto

## 💡 Valores Padrão Inspiracionais
O bloco vem com conteúdo padrão motivacional:
- **Título:** "Nosso propósito"
- **Parágrafo 1:** Sobre inspirar alunos extraordinários
- **Parágrafo 2:** Citação de Abraham Maslow
- **Botão:** "Quero que meus filhos tenham um futuro brilhante"

## 🔄 Customização e Manutenção
- **Fácil edição:** Todos os campos editáveis via painel lateral
- **Imagens flexíveis:** Upload direto pela Media Library
- **Textos adaptáveis:** Conteúdo personalizável para qualquer contexto
- **Botão configurável:** URL e texto totalmente editáveis
- **Design consistente:** Mantém identidade visual do tema
