# Bloco ACF: Nossos Professores

## 📝 Descrição
Bloco para exibição de uma seção de professores/instrutores com fotos, nomes, especialidades e biografias. Interface de configuração modal integrada no editor.

## 🔧 Recursos
- ✅ Título da seção editável
- ✅ Múltiplos professores configuráveis
- ✅ Fotos dos professores
- ✅ Nome e especialidade
- ✅ Biografia completa
- ✅ Layout responsivo em grid
- ✅ Modal de configuração no editor
- ✅ Preview em tempo real
- ✅ Design profissional

## 📂 Estrutura de Arquivos
```
professors/
├── professors.php       # Template principal do bloco
├── register.php         # Registro do bloco ACF
└── README.md           # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 📋 Configuração Principal
- **Título da Seção:** Título principal da seção
  - Padrão: "Nossos Professores"
  - Configurável via modal

### 👨‍🏫 Dados dos Professores
Cada professor contém:
- **Foto:** Upload de imagem do professor
- **Nome:** Nome completo do professor
- **Especialidade:** Área de atuação/expertise
- **Biografia:** Descrição detalhada do professor

## 🎨 Interface de Configuração

### 🔧 Modal Integrado
- **Botão de Configuração:** Aparece quando bloco não está configurado
- **Modal Overlay:** Interface completa para configuração
- **Formulário:** Campos organizados e intuitivos
- **Preview:** Visualização em tempo real das mudanças

### 📱 Layout Responsivo
- **Desktop:** Grid de múltiplas colunas
- **Tablet:** Adaptação para telas médias
- **Mobile:** Layout em coluna única
- **Imagens:** Responsivas e otimizadas

## 🚀 Funcionalidades JavaScript

### 🎭 Sistema Modal
```javascript
function openProfessorsModal() {
    // Abre modal de configuração
}

function closeProfessorsModal() {
    // Fecha modal
}

function addProfessor() {
    // Adiciona novo professor ao formulário
}

function removeProfessor(index) {
    // Remove professor específico
}
```

### 📋 Gestão de Dados
- **Adicionar:** Novos professores dinamicamente
- **Remover:** Professores existentes
- **Upload:** Integração com Media Library do WordPress
- **Validação:** Campos obrigatórios validados

## 📋 Como Usar

### 🏗️ No Editor
1. Adicione o bloco "Nossos Professores" da categoria "BrightMinds"
2. Clique em "Configurar Professores" se não configurado
3. No modal:
   - Defina o título da seção
   - Adicione professores um por um
   - Faça upload das fotos
   - Preencha nome, especialidade e biografia
4. Salve e visualize o resultado

### 👀 No Frontend
- Grid organizado de professores
- Fotos em destaque
- Informações bem estruturadas
- Layout profissional e atrativo

## 🎨 Estrutura Visual

### 📐 Layout Grid
```css
.professors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}
```

### 🖼️ Cards de Professor
- **Foto:** Circular ou quadrada, responsiva
- **Nome:** Destaque tipográfico
- **Especialidade:** Subtitle diferenciado
- **Biografia:** Texto formatado e legível

## 🔗 Integrações
- **WordPress Media Library:** Para upload de imagens
- **ACF Fields:** Campos personalizados estruturados
- **JavaScript Modal:** Interface nativa do WordPress
- **CSS Grid/Flexbox:** Layout moderno e responsivo

## ⚠️ Recursos de Segurança
- **Verificação ABSPATH:** Previne acesso direto
- **Sanitização:** Todos os dados são sanitizados
- **Validação:** Campos obrigatórios verificados
- **Escape:** Output seguro para prevenir XSS

## 🎯 Estados do Bloco

### 🚫 Não Configurado
- Exibe modal de configuração
- Interface amigável para primeira configuração
- Instruções claras para o usuário

### ✅ Configurado
- Exibe grid de professores
- Layout profissional
- Todas as informações visíveis

### 🔧 Modo Edição
- Modal acessível para edições
- Preview em tempo real
- Interface integrada ao editor

## 📊 Performance
- **Lazy Loading:** Imagens carregadas sob demanda
- **CSS Otimizado:** Estilos mínimos necessários
- **JavaScript Condicional:** Carrega apenas quando necessário
- **Responsive Images:** Diferentes tamanhos para diferentes telas

## 🎯 Casos de Uso Ideais
- **Páginas institucionais** de escolas e cursos
- **Sites de consultoria** com equipe especializada
- **Plataformas educacionais** com instrutores
- **Empresas de treinamento** com time qualificado
- **Qualquer site** que precise apresentar uma equipe profissional

## 🔄 Atualizações e Manutenção
- **Fácil edição:** Modal intuitivo para mudanças
- **Adicionar/Remover:** Professores dinamicamente
- **Atualizar fotos:** Integração com Media Library
- **Modificar conteúdo:** Sem necessidade de código
