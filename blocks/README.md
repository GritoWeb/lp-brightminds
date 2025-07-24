# Blocos ACF - LP BrightMinds

Este diretório contém os blocos customizados desenvolvidos com Advanced Custom Fields (ACF) para o tema LP BrightMinds.

## � Pré-requisitos

### Plugin ACF Obrigatório
Para que os blocos funcionem, é necessário ter o plugin **Advanced Custom Fields** instalado e ativo:

1. **Instalar ACF:**
   - Vá em `Plugins > Adicionar Novo`
   - Procure por "Advanced Custom Fields"
   - Instale e ative o plugin

2. **Verificar se ACF está funcionando:**
   - Vá em `Campos Personalizados` no admin do WordPress
   - Se aparecer o menu, está funcionando corretamente

## 📦 Blocos Disponíveis

### �🔘 Botão Primário (`acf/primary-button`)

Um botão customizável com as seguintes opções editáveis:

**Campos Disponíveis:**
- ✅ **Texto do Botão** - Campo de texto para o conteúdo do botão
- ✅ **URL do Link** - Campo de URL para o destino do botão
- ✅ **Cor de Fundo** - Seletor de cor para o fundo do botão
- ✅ **Cor do Texto** - Seletor de cor para o texto do botão
- ✅ **Cor de Fundo (Hover)** - Cor de fundo quando o mouse passa sobre o botão
- ✅ **Cor do Texto (Hover)** - Cor do texto quando o mouse passa sobre o botão

**HTML Gerado:**
```html
<div class="primary-button-block">
    <div class="lg:pt-12 py-8 lg:py-0">
        <a href="[URL]" class="open-modal bg-primary py-3 px-8 text-3xl rounded-3xl text-background hover:bg-white hover:text-hover duration-300 primary-button" style="[cores customizadas]">
            [Texto do Botão]
        </a>
    </div>
</div>
```

### 🎥 YouTube Video (`acf/youtube-video`)

Um player de YouTube com thumbnail personalizada que carrega o vídeo ao clicar:

**Campos Disponíveis:**
- ✅ **URL do YouTube** - URL completa do YouTube ou embed
- ✅ **Imagem Thumbnail** - Imagem que aparece antes de reproduzir o vídeo
- ✅ **Largura (Desktop)** - Largura do vídeo em pixels para desktop (padrão: 560px)
- ✅ **Altura (Desktop)** - Altura do vídeo em pixels para desktop (padrão: 315px)
- ✅ **Altura (Mobile)** - Altura do vídeo em pixels para mobile (padrão: 200px)

**HTML Gerado:**
```html
<div class="youtube-video-block">
    <div>
        <div id="youtube-embed-[ID]" class="youtube-placeholder rounded-3xl cursor-pointer" 
             style="background-image: url('[THUMBNAIL]'); [dimensões]"
             data-embed-url="[YOUTUBE_EMBED_URL]">
            <div class="play-button-overlay">
                [Botão Play SVG]
            </div>
        </div>
    </div>
</div>
```

**Funcionalidades:**
- ✅ **Lazy Loading** - Vídeo só carrega quando clicado
- ✅ **Responsivo** - Adapta às dimensões da tela
- ✅ **Acessível** - Suporte a teclado e leitores de tela
- ✅ **Efeitos Hover** - Animações suaves ao passar o mouse
- ✅ **YouTube NoScript** - Usa domínio sem cookies para privacidade

### 👨‍🏫 Nossos Professores (`acf/professors`)

Um bloco com repeater para exibir uma seção de professores/equipe:

**Campos Disponíveis:**
- ✅ **Título da Seção** - Título principal (ex: "Nossos Professores")
- ✅ **Descrição da Seção** - Descrição que aparece abaixo do título
- ✅ **Lista de Professores (Repeater)** - Adicione quantos professores desejar:
  - **Foto do Professor** - Upload de imagem (formato quadrado recomendado)
  - **Nome Completo** - Nome do professor
  - **Cargo/Especialidade** - Área de atuação (aparece em negrito)
  - **Descrição/Biografia** - Texto descritivo sobre o professor
- ✅ **Configurações de Layout**:
  - **Colunas no Desktop** - 1, 2 ou 3 colunas
  - **Exibir Título da Seção** - Liga/desliga título
  - **Exibir Descrição da Seção** - Liga/desliga descrição

**Características Especiais:**
- 🔄 **Repeater Intuitivo** - Interface amigável para adicionar/remover professores
- 📱 **Totalmente Responsivo** - Layout adapta para mobile automaticamente
- 🎨 **Hover Effects** - Animações suaves ao passar o mouse
- 👁️ **Preview no Editor** - Visualização em tempo real
- 📊 **Status no Admin** - Mostra quantos professores estão configurados
- ♿ **Acessível** - Alt text automático para imagens

**HTML Gerado:**
```html
<div class="professors-block">
    <div class="container pb-8">
        <div class="text-center">
            <h2 class="uppercase mb-4">[Título da Seção]</h2>
            <p>[Descrição da Seção]</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <!-- Para cada professor no repeater -->
            <div class="professor-item flex items-center gap-4">
                <div class="professor-image w-[190px]">
                    <img src="[Foto]" alt="[Nome]" class="rounded-full">
                </div>
                <div class="professor-content w-[70%]">
                    <h3 class="professor-name">[Nome]</h3>
                    <p class="professor-info">
                        <span class="professor-position font-bold">[Cargo]</span><br>
                        <span class="professor-description">[Descrição]</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
```

### ⭐ Diferenciais (`acf/diferenciais`)

Um bloco com repeater para exibir diferenciais/vantagens com ícones:

**Campos Disponíveis:**
- ✅ **Título da Seção** - Título principal (ex: "Diferenciais")
- ✅ **Lista de Diferenciais (Repeater)** - Adicione quantos diferenciais desejar:
  - **Ícone** - Upload de ícone SVG/PNG (50x50px recomendado)
  - **Título** - Título do diferencial
  - **Descrição** - Texto descritivo detalhado

**Características Especiais:**
- 🔄 **Repeater Intuitivo** - Interface amigável com modal de configuração
- 📱 **Layout Responsivo** - Grid 3 colunas (desktop) / 1 coluna (mobile)
- 🎯 **Ícones Customizáveis** - Upload direto de ícones
- 👁️ **Preview em Tempo Real** - Visualização no editor
- 📊 **Status no Admin** - Mostra quantos diferenciais configurados
- 🎨 **Estilo Padrão** - Background primary, texto branco

**HTML Gerado:**
```html
<section class="diferenciais bg-primary py-32 no-margin-y">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold uppercase mb-12">[Título]</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Para cada diferencial no repeater -->
            <div class="flex items-start">
                <div class="icon mb-4 w-[50px] h-[50px] flex-shrink-0 mr-4">
                    <img src="[Ícone]" alt="[Título]" class="w-[50px] h-[50px]">
                </div>
                <div>
                    <h3 class="text-xl font-bold uppercase mb-2">[Título]</h3>
                    <p>[Descrição]</p>
                </div>
            </div>
        </div>
    </div>
</section>
```

### 📚 FAQ - Dúvidas Frequentes (`acf/faq`)

Um bloco para exibir perguntas frequentes em formato de accordion:

**Campos Disponíveis:**
- ✅ **Título da Seção** - Título principal (ex: "Dúvidas Frequentes")
- ✅ **Lista de Perguntas e Respostas (Repeater)** - Adicione quantas perguntas desejar:
  - **Pergunta** - Texto da pergunta
  - **Resposta** - Texto da resposta (pode ser longa)

**HTML Gerado:**
```html
<section class="bg-white py-16 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">[Título]</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="space-y-4">
            <!-- Para cada pergunta no repeater -->
            <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" type="button" data-target="faq-item-0" aria-expanded="true" aria-controls="faq-item-0">
                    <span class="font-semibold text-gray-900 pr-4">[Pergunta]</span>
                    <svg class="faq-icon w-5 h-5 text-blue-600 transform transition-transform duration-200 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <div id="faq-item-0" class="faq-content" aria-labelledby="faq-item-0-button">
                    <div class="px-6 py-4 border-t border-gray-200 bg-white">
                        <p class="text-gray-700 leading-relaxed">[Resposta]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

## 🎨 Como Usar no WordPress

### 1. **No Editor Gutenberg:**
1. Clique no botão "+" para adicionar um novo bloco
2. Procure por "Botão Primário" na seção "Design"
3. Procure por "YouTube Video" na seção "Mídia"
4. Procure por "Nossos Professores" na seção "Equipe"
5. Procure por "Diferenciais" na seção "Marketing"
6. Procure por "FAQ" na seção "Marketing"
7. Clique no bloco para inseri-lo
8. Configure os campos no painel lateral direito

### 2. **Configuração dos Campos:**
1. **Texto do Botão:** Digite o texto que aparecerá no botão
2. **URL do Link:** Coloque a URL de destino (ex: `https://exemplo.com`)
3. **Cores:** Use os seletores de cor para personalizar a aparência
4. **Título da Seção:** Defina o título para a seção de professores
5. **Descrição da Seção:** Adicione uma descrição para a seção de professores
6. **Preview:** Veja o resultado em tempo real no editor

## 📁 Estrutura dos Arquivos (Nova Organização)

```
blocks/
├── primary-button.php              # Template do bloco Botão Primário
├── primary-button-register.php     # Registro e campos ACF do Botão Primário
├── youtube-video.php               # Template do bloco YouTube Video  
├── youtube-video-register.php      # Registro e campos ACF do YouTube Video
├── professors.php                  # Template do bloco Nossos Professores
├── professors-register.php         # Registro e campos ACF do bloco Nossos Professores
├── diferenciais.php                # Template do bloco Diferenciais
├── diferenciais-register.php       # Registro e campos ACF do bloco Diferenciais
├── faq.php                         # Template do bloco FAQ
├── faq-register.php                # Registro e campos ACF do bloco FAQ
├── blocks.css                      # Estilos dos blocos
├── exemplo.html                    # Arquivo de demonstração
├── README.md                       # Esta documentação
└── ATIVACAO.md                     # Instruções de ativação
```

## 🔧 Desenvolvimento

### Nova Estrutura Modular

Cada bloco agora possui 2 arquivos:
1. **`[nome]-register.php`** - Contém o registro do bloco e campos ACF
2. **`[nome].php`** - Contém apenas o template/HTML do bloco

### Adicionando Novos Blocos ACF

1. **Criar arquivo de template:**
   ```php
   // blocks/novo-bloco.php
   <?php
   $campo = get_field('campo');
   ?>
   <div class="novo-bloco">
       <!-- HTML do bloco -->
   </div>
   ```

2. **Criar arquivo de registro:**
   ```php
   // blocks/novo-bloco-register.php
   <?php
   if (function_exists('acf_register_block_type')) {
       acf_register_block_type(array(
           'name' => 'novo-bloco',
           'title' => __('Novo Bloco'),
           'render_template' => 'blocks/novo-bloco.php',
           // ... outras configurações
       ));
   }
   
   if (function_exists('acf_add_local_field_group')) {
       acf_add_local_field_group(array(
           // ... definir campos
       ));
   }
   ```

3. **O functions.php automaticamente carregará** o arquivo de registro quando terminar com `-register.php`

## ✅ Vantagens da Nova Estrutura

- ✅ **Modular** - Cada bloco é independente
- ✅ **Organizado** - Separação clara entre template e registro
- ✅ **Escalável** - Fácil adicionar novos blocos
- ✅ **Manutenível** - Código limpo e bem estruturado
- ✅ **Functions.php limpo** - Apenas carrega os blocos, sem código específico

## 🐛 Troubleshooting

### Bloco não aparece no editor:
1. Verificar se ACF está instalado e ativo
2. Verificar se o arquivo `-register.php` existe
3. Verificar se não há erros PHP no log
4. Limpar cache se usando algum plugin de cache

### Campos não aparecem:
1. Verificar se a função `acf_add_local_field_group` está sendo chamada
2. Verificar se o `location` está correto (`acf/nome-do-bloco`)

### Estilos não carregam:
1. Verificar se o arquivo `blocks.css` existe
2. Verificar se está sendo enfileirado no `functions.php`
3. Limpar cache do browser

## 6. 📚 Bloco FAQ - Dúvidas Frequentes

### Arquivos:
- `blocks/faq/register.php` - Registro e campos ACF
- `blocks/faq/faq.php` - Template front-end
- `blocks/faq/backend.php` - Modal de configuração (admin)

### Campos Disponíveis:
- **Título da Seção** (Texto)
- **Lista de Perguntas e Respostas** (Repeater)
  - **Pergunta** (Texto)
  - **Resposta** (Textarea)

### Funcionalidades:
- ✅ **Usa JavaScript existente** (`js/faq.js`)
- ✅ **Usa CSS existente** (`resources/css/app.css`)
- ✅ **Classes compatíveis** com o sistema atual
- ✅ **Modal amigável** no backend com preview
- ✅ **Totalmente responsivo** usando Tailwind
- ✅ **Até 20 perguntas** por seção

### Classes CSS Utilizadas:
- `.faq-item` - Container de cada pergunta/resposta
- `.faq-question` - Botão da pergunta (com estilos existentes)
- `.faq-answer` - Container da resposta
- `.faq-icon` - Ícone + / - (com CSS existente)

### HTML Gerado:
```html
<section class="container my-24">
    <h2 class="font-medium uppercase mb-6 lg:text-[3.625rem]!">[Título]</h2>
    
    <!-- Para cada pergunta no repeater -->
    <div class="faq-item border-b py-1 border-gray-300">
        <button class="faq-question flex justify-between items-center w-full py-4 font-bold">
            [Pergunta]
            <span class="faq-icon relative inline-block w-5 h-5"></span>
        </button>
        <div class="faq-answer overflow-hidden max-h-0 transition-all duration-300">
            <p class="py-2">[Resposta]</p>
        </div>
    </div>
</section>
```

### JavaScript Existente:
O bloco utiliza o arquivo `js/faq.js` que já implementa:
- ✅ Accordion funcional
- ✅ Classe `.open` para controle de estado
- ✅ `maxHeight` dinâmico para animações
- ✅ Fechar outros itens ao abrir um novo