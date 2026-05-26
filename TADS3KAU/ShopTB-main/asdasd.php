<?php include "header.php" ?>

    <h2 class="text-center">Cadastro de Imóvel</h2>
        
    <form action="actionImovel.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

        <div class="row mb-3">
            <!-- Campo para a categoria do Imovel -->
            <label for="categoriaImovel" class="form-label">Categoria:</label>
            <select id="categoriaImovel" name="categoriaImovel" class="form-select" required>
                <option value="">Selecione...</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Casa">Casa</option>
                <option value="Comercial">Comercial</option>
                <option value="Sobrado">Sobrado</option>
                <option value="Rural">Rural</option>
                <option value="Terreno">Terreno</option>
            </select>
            <div class="invalid-feedback">Por favor, selecione uma categoria.</div>
        </div>

        <div class="row mb-3">
            <!-- Campo para a cidade do Imovel -->
            <label for="cidadeImovel" class="form-label">Cidade:</label>
            <select id="cidadeImovel" name="cidadeImovel" class="form-select" required>
                <option value="">Selecione...</option>
                <option value="Curiuva">Curiúva</option>
                <option value="Imbau">Imbaú</option>
                <option value="Reserva">Reserva</option>
                <option value="Telemaco">Telêmaco Borba</option>
                <option value="Tibagi">Tibagi</option>
            </select>
            <div class="invalid-feedback">Por favor, selecione uma cidade.</div>
        </div>

        <div class="row mb-3">
            <!-- Campo para upload da foto do Imovel -->
            <label for="fotoImovel" class="form-label">Foto do Imóvel:</label>
            <input type="file" id="fotoImovel" name="fotoImovel" class="form-control" accept="image/*" required>
            <div class="invalid-feedback">Por favor, envie uma foto do Imóvel.</div>
        </div>

        <div class="row mb-3">
            <!-- Campo para o valor do Planta -->
            <label for="valorImovel" class="form-label">Valor:</label>
            <input type="text" id="valorImovel" name="valorImovel" class="form-control" placeholder="Ex.: R$ 350.000,00" maxlength="12" required>
            <div class="invalid-feedback">Por favor, insira o valor do Imóvel.</div>
        </div>

        <!-- Botão para enviar o formulário -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-secondary">Cadastrar Imóvel</button>
        </div>

    </form>

<?php include "footer.php" ?>

C:\xampp\htdocs\TADS3KAU\prova0504\Imoveis\img