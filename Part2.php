<?php

class BoletoBancoBrasil extends BoletoAbstrato {

    public function gerarCodigoBarras(): string {
        $valor = number_format($this->valor, 2, '.', '');
        $data = (new DateTime($this->dataVencimento))->format('Ymd');
        return "001" . $valor . $data . "0011550225630"; 
    }

    public function validar(): bool {
        $valorValido = $this->valor > 0;
        $dataHoje = new DateTime();
        $dataVenc = new DateTime($this->dataVencimento);
        return $valorValido && ($dataVenc >= $dataHoje);
    }

    protected function renderizarHtml(): string {
        return "<div>Boleto BB - R$ {$this->valor} - Venc: {$this->dataVencimento}</div>";
    }

    protected function renderizarPdf(): string {
        return "[PDF] Boleto BB - R$ {$this->valor} - Venc: {$this->dataVencimento}";
    }
}

