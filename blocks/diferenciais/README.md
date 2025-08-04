# Bloco ACF: Diferenciais

## 📝 Descrição
Bloco para destacar os principais diferenciais, vantagens ou características especiais de um produto, serviço ou empresa. Layout visual atrativo com ícones e descrições.

## 🔧 Recursos
- ✅ Título da seção editável
- ✅ Múltiplos diferenciais configuráveis
- ✅ Ícones personalizáveis para cada diferencial
- ✅ Título e descrição individuais
- ✅ Layout responsivo em grid
- ✅ Design visual atrativo
- ✅ Backend intuitivo para configuração
- ✅ Preview no editor

## 📂 Estrutura de Arquivos
```
diferenciais/
├── diferenciais.php     # Template principal do bloco
├── register.php         # Registro do bloco ACF
├── backend.php          # Interface de configuração
└── README.md           # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 📋 Configuração Principal
- **Título da Seção:** Título principal da seção
  - Padrão: "Diferenciais"
  - Tipo: Texto

### ⭐ Itens dos Diferenciais
Cada diferencial contém:
- **Ícone:** Ícone visual para representar o diferencial
- **Título:** Nome/título do diferencial
- **Descrição:** Explicação detalhada do diferencial

## 🎨 Design e Layout

### 📐 Estrutura Visual
- **Container:** Seção completa com padding responsivo
- **Título:** Centralizado e destacado
- **Grid:** Layout em grid responsivo para os itens
- **Cards:** Cada diferencial em card individual

### 🎯 Elementos Visuais
- **Ícones:** Elementos visuais para identificação rápida
- **Hierarquia:** Títulos e descrições bem definidos
- **Espaçamento:** Breathing room adequado entre elementos
- **Cores:** Esquema harmônico com o tema

## 📱 Responsividade
- **Desktop:** Grid de múltiplas colunas
- **Tablet:** Adaptação para telas médias
- **Mobile:** Layout em coluna única ou duas colunas
- **Flexibilidade:** Ajuste automático baseado no conteúdo

## 🚀 Backend Personalizado

### 🎛️ Interface de Configuração
- **Backend.php:** Interface customizada para configuração
- **Formulário estruturado:** Campos organizados e intuitivos
- **Preview em tempo real:** Visualização das mudanças
- **Validação:** Verificação de campos obrigatórios

### 📋 Estados do Bloco
- **Não configurado:** Mensagem explicativa no editor
- **Em configuração:** Interface do backend.php
- **Configurado:** Exibição normal dos diferenciais

## 📋 Como Usar

### 🏗️ No Editor
1. Adicione o bloco "Diferenciais" da categoria "BrightMinds"
2. Configure o título da seção no painel lateral
3. Adicione diferenciais usando o campo repeater:
   - Escolha um ícone representativo
   - Defina o título do diferencial
   - Escreva uma descrição clara
4. Visualize o resultado no editor

### 👀 No Frontend
- Seção bem estruturada com título
- Grid organizado de diferenciais
- Cada item com ícone, título e descrição
- Layout profissional e atrativo

## 🎨 Estrutura CSS

### 📦 Classes Principais
```css
.diferenciais-block     /* Container principal */
.diferenciais-grid      /* Grid dos itens */
.diferencial-item       /* Item individual */
.diferencial-icon       /* Ícone do diferencial */
.diferencial-title      /* Título do diferencial */
.diferencial-description /* Descrição do diferencial */
```

### 🎯 Layout Grid
- **Auto-fit:** Colunas que se ajustam automaticamente
- **Min-width:** Largura mínima para manter legibilidade
- **Gap:** Espaçamento consistente entre itens
- **Responsive:** Adaptação automática a diferentes telas

## 🔗 Integrações
- **ACF Repeater:** Para múltiplos diferenciais
- **Icon Library:** Integração com biblioteca de ícones
- **WordPress Editor:** Preview nativo no Gutenberg
- **CSS Grid:** Layout moderno e flexível

## ⚠️ Recursos de Segurança
- **Verificação ABSPATH:** Previne acesso direto ao arquivo
- **Sanitização:** Todos os outputs são sanitizados
- **Validação:** Campos obrigatórios verificados
- **Conditional Loading:** Backend carregado apenas quando necessário

## 🎯 Estados e Condições

### 🚫 Sem Configuração (Admin)
```php
if (empty($diferenciais) && is_admin()) {
    // Mostra interface de configuração
    include_once 'backend.php';
}
```

### ✅ Com Configuração
```php
// Renderiza os diferenciais normalmente
foreach ($diferenciais as $diferencial) {
    // Exibe cada item
}
```

### 👀 Frontend Vazio
```php
if (empty($diferenciais) && !is_admin()) {
    return; // Não mostra nada
}
```

## 📊 Performance
- **Conditional Loading:** Backend carregado apenas quando necessário
- **CSS Otimizado:** Estilos mínimos e eficientes
- **Semantic HTML:** Estrutura limpa e acessível
- **Lazy Loading:** Ícones e imagens otimizadas

## 🎯 Casos de Uso Ideais
- **Landing pages** destacando vantagens do produto
- **Páginas de serviços** com benefícios oferecidos
- **Sites institucionais** com diferenciais da empresa
- **E-commerce** com características dos produtos
- **Páginas de vendas** com argumentos de venda

## 🔄 Manutenção e Atualizações
- **Fácil edição:** Interface intuitiva no painel lateral
- **Adicionar/Remover:** Diferenciais dinamicamente
- **Modificar ícones:** Biblioteca integrada de ícones
- **Atualizar textos:** Sem necessidade de código
- **Reordenar:** Arrastar e soltar no repeater ACF
