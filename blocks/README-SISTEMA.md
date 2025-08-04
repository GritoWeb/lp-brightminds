# 🧩 Sistema de Blocos ACF - Bright Minds

## 📋 Visão Geral
Sistema completo de blocos personalizados desenvolvidos com Advanced Custom Fields (ACF) para o tema Bright Minds. Cada bloco é modular, reutilizável e totalmente configurável via interface do WordPress.

## 🔧 Pré-requisitos
- **WordPress** 5.0+
- **Plugin ACF (Advanced Custom Fields)** - Obrigatório
- **Tema Bright Minds** ativo

## 📦 Blocos Disponíveis

### 🎯 **Primary Button** (`acf/primary-button`)
Botão personalizável com opções avançadas de estilo e efeitos hover.
- **Arquivo:** `primary-button/`
- **Função:** Botões de call-to-action e navegação
- **Campos:** Texto, URL, cores, alinhamento, dimensões, bordas
- **Features:** Efeitos hover, classe modal automática, design responsivo
- **[📖 Documentação completa](primary-button/README.md)**

### 🎬 **YouTube Video** (`acf/youtube-video`)
Player de YouTube com thumbnail personalizada e carregamento lazy.
- **Arquivo:** `youtube-video/`
- **Função:** Incorporação otimizada de vídeos do YouTube
- **Campos:** URL, thumbnail, dimensões (desktop/mobile)
- **Features:** Lazy loading, autoplay, acessibilidade, no-cookie
- **[📖 Documentação completa](youtube-video/README.md)**

### ❓ **FAQ** (`acf/faq`)
Sistema de perguntas e respostas com funcionalidade de acordeão.
- **Arquivo:** `faq/`
- **Função:** Seção de dúvidas frequentes
- **Campos:** Título da seção, múltiplas perguntas e respostas
- **Features:** Acordeão interativo, animações suaves, editor rico
- **[📖 Documentação completa](faq/README.md)**

### 👨‍🏫 **Professores** (`acf/professors`)
Seção para apresentação de equipe/instrutores com modal de configuração.
- **Arquivo:** `professors/`
- **Função:** Exibição de professores/instrutores
- **Campos:** Título, foto, nome, especialidade, biografia
- **Features:** Modal de configuração, grid responsivo, upload de imagens
- **[📖 Documentação completa](professors/README.md)**

### ⭐ **Diferenciais** (`acf/diferenciais`)
Destaque de vantagens e características especiais com ícones.
- **Arquivo:** `diferenciais/`
- **Função:** Apresentar diferenciais competitivos
- **Campos:** Título, ícones, títulos e descrições dos diferenciais
- **Features:** Grid responsivo, ícones personalizáveis, backend customizado
- **[📖 Documentação completa](diferenciais/README.md)**

### 💝 **Nosso Propósito** (`acf/nosso-proposito`)
Seção institucional para missão/propósito com layout visual impactante.
- **Arquivo:** `nosso-proposito/`
- **Função:** Apresentar missão/propósito da instituição
- **Campos:** Imagem, título, parágrafos, botão CTA
- **Features:** Layout híbrido, valores padrão inspiracionais, responsivo
- **[📖 Documentação completa](nosso-proposito/README.md)**

### 📝 **Formulário de Cadastro** (`acf/cadastro-form`)
Formulário estático para cadastro na plataforma (sem campos editáveis).
- **Arquivo:** `cadastro-form/`
- **Função:** Cadastro de usuários na plataforma
- **Campos:** Nenhum (formulário estático)
- **Features:** Integração API, validação, tag automática, design otimizado
- **[📖 Documentação completa](cadastro-form/README.md)**

## 🏗️ Arquitetura dos Blocos

### 📂 Estrutura Padrão
Cada bloco segue a mesma estrutura organizacional:

```
nome-do-bloco/
├── nome-do-bloco.php   # Template principal
├── register.php        # Registro e campos ACF
├── backend.php         # Interface de configuração (opcional)
└── README.md          # Documentação específica
```

### 🔧 Componentes
- **Template Principal:** Renderização frontend do bloco
- **Registro ACF:** Configuração de campos e metadados
- **Backend:** Interface customizada para configuração
- **Documentação:** Guia específico de cada bloco

## ⚙️ Sistema de Configuração

### 📁 Arquivos Globais
- **`blocks-config.php`** - Configurações globais dos blocos
- **`blocks.css`** - Estilos globais dos blocos
- **`ACTIVATION.md`** - Guia de ativação
- **`ATIVACAO.md`** - Guia de ativação em português

### 🎯 Categoria Personalizada
Todos os blocos são organizados na categoria **"BrightMinds"** no editor do WordPress.

## 📋 Como Usar

### 🚀 Para Usuários
1. **No Editor do WordPress:**
   - Clique em "+" para adicionar bloco
   - Procure pela categoria "BrightMinds"
   - Selecione o bloco desejado
   - Configure através do painel lateral
   - Publique a página

### 👨‍💻 Para Desenvolvedores
1. **Adicionar Novo Bloco:**
   - Crie pasta com nome do bloco
   - Implemente os arquivos obrigatórios
   - Siga a estrutura padrão
   - Documente no README.md

2. **Modificar Bloco Existente:**
   - Edite o arquivo template (.php)
   - Atualize campos no register.php
   - Modifique estilos no blocks.css
   - Atualize documentação

## 🎨 Estilos e CSS

### 📱 Responsividade
Todos os blocos são desenvolvidos com:
- **Mobile First:** Design otimizado para dispositivos móveis
- **Breakpoints:** Adaptação para tablet e desktop
- **Flexbox/Grid:** Layouts modernos e flexíveis
- **Touch Friendly:** Interações otimizadas para touch

### 🎯 Metodologia CSS
- **BEM Naming:** Convenção de nomenclatura consistente
- **Component-based:** Estilos encapsulados por bloco
- **CSS Variables:** Para customizações dinâmicas
- **Performance:** Estilos otimizados e minificados

## 🔐 Segurança

### ✅ Práticas Implementadas
- **Sanitização:** Todos os outputs são sanitizados
- **Escape:** Dados escapados para prevenir XSS
- **Verificação ABSPATH:** Prevenção de acesso direto
- **Validação:** Campos validados antes do processamento
- **Nonces:** Proteção contra CSRF (quando aplicável)

## 📊 Performance

### ⚡ Otimizações
- **Lazy Loading:** Carregamento sob demanda
- **Conditional Loading:** Scripts carregados apenas quando necessário
- **CSS Minificado:** Estilos otimizados
- **Semantic HTML:** Markup limpo e acessível
- **Responsive Images:** Imagens adaptáveis automaticamente

## 🔄 Versionamento e Atualizações

### 📝 Changelog
Todas as mudanças são documentadas em:
- README individual de cada bloco
- Comentários no código
- Git commits descritivos

### 🚀 Deploy
1. Desenvolvimento local
2. Teste em staging
3. Documentação atualizada
4. Deploy para produção

## 🆘 Suporte e Troubleshooting

### ❗ Problemas Comuns
- **ACF não instalado:** Instalar plugin Advanced Custom Fields
- **Blocos não aparecem:** Verificar se ACF está ativo
- **Estilos não aplicados:** Limpar cache do site
- **JavaScript não funciona:** Verificar console para erros

### 🔍 Debug
Para ativar debug mode:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

## 📞 Contato
Para suporte técnico ou sugestões, consulte a documentação individual de cada bloco ou entre em contato com a equipe de desenvolvimento.
