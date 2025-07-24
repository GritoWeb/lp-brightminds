# ✅ Como Ativar o Bloco ACF "Botão Primário"

## 🚀 Passos para Ativação

### 1. **Instalar e Ativar o Plugin ACF**
```
WordPress Admin > Plugins > Adicionar Novo
Procurar: "Advanced Custom Fields"
Instalar e Ativar
```

### 2. **Verificar se o Tema está Ativo**
```
WordPress Admin > Aparência > Temas
Ativar: "LP BrightMinds"
```

### 3. **Verificar se os Arquivos Estão no Lugar**
- ✅ `blocks/primary-button.php` - Template do bloco
- ✅ `blocks/blocks.css` - Estilos
- ✅ `functions.php` - Funções de registro

### 4. **Testar o Bloco**
1. Ir em `Páginas/Posts > Adicionar Novo`
2. Clicar no "+" para adicionar bloco
3. Procurar por "Botão Primário" na categoria "Design"
4. Procurar por "YouTube Video" na categoria "Mídia"
5. Procurar por "Nossos Professores" na categoria "BrightMinds"
6. Inserir os blocos e configurar os campos

## 🔍 Verificações de Debug

### Se o bloco não aparecer:

1. **Verificar se ACF está ativo:**
   ```php
   // No functions.php, adicionar temporariamente:
   add_action('admin_notices', function() {
       if (!function_exists('acf_register_block_type')) {
           echo '<div class="notice notice-error"><p>ACF não está ativo!</p></div>';
       } else {
           echo '<div class="notice notice-success"><p>ACF está funcionando!</p></div>';
       }
   });
   ```

2. **Verificar logs de erro:**
   - Ir em `Ferramentas > Saúde do Site`
   - Procurar por erros PHP

3. **Testar se a função está sendo chamada:**
   ```php
   // Adicionar no functions.php temporariamente:
   add_action('admin_notices', function() {
       echo '<div class="notice notice-info"><p>Função de blocos carregada!</p></div>';
   });
   ```

## 🎯 O que os Blocos Fazem

### Botão Primário (`acf/primary-button`)
#### Campos Editáveis:
- 📝 **Texto do Botão** (obrigatório)
- 🔗 **URL do Link** (obrigatório)
- 🎨 **Cor de Fundo** (opcional - padrão: #007cba)
- 🎨 **Cor do Texto** (opcional - padrão: #ffffff)
- 🎨 **Cor de Fundo Hover** (opcional - padrão: #ffffff)
- 🎨 **Cor do Texto Hover** (opcional - padrão: #007cba)

### YouTube Video (`acf/youtube-video`)
#### Campos Editáveis:
- 🎥 **URL do YouTube** (obrigatório) - Ex: https://www.youtube.com/watch?v=ABC123
- 🖼️ **Imagem Thumbnail** (obrigatório) - Imagem que aparece antes do play
- 📐 **Largura Desktop** (opcional - padrão: 560px)
- 📐 **Altura Desktop** (opcional - padrão: 315px)  
- 📱 **Altura Mobile** (opcional - padrão: 200px)

#### Funcionalidades:
- ✅ **Lazy Loading** - Vídeo só carrega quando clicado
- ✅ **Botão Play** - Overlay com botão do YouTube
- ✅ **Responsivo** - Adapta automaticamente ao dispositivo
- ✅ **Acessível** - Funciona com teclado e leitores de tela

## ✨ Vantagens desta Implementação

- ✅ **Sem dependências JS** - Apenas PHP puro
- ✅ **Interface familiar** - Campos ACF que editores já conhecem
- ✅ **Leve** - Sem build process ou bundles grandes
- ✅ **Compatível** - Funciona com qualquer versão do WordPress
- ✅ **Fácil manutenção** - Código PHP simples de entender
- ✅ **Preview instantâneo** - Visualização em tempo real no editor

## 🆘 Suporte

Se o bloco não funcionar:
1. Verificar se ACF está instalado
2. Verificar se não há erros PHP
3. Limpar cache (se usando plugins de cache)
4. Verificar se o tema está ativo
