<?php

/*
Parte 3: Extensão – Desafio

O Itaú precisa de um recurso extra: aplicar juros no valor do boleto.
Pra não obrigar todos os bancos a ter isso, eu criei uma interface nova
só pra quem precisa (BoletoComJurosInterface). Assim só o Itaú usa, 
e os outros continuam do mesmo jeito.
*/

interface BoletoComJurosInterface {
    public function aplicarJuros(float $taxa): void;
}

class BoletoItau extends BoletoAbstrato implements BoletoComJurosInterface {

    public function aplicarJuros(float $taxa): void {
        $this->valor += $this->valor * $taxa;
    }

    public function gerarCodigoBarras(): string {
        $valor = number_format($this->valor, 2, '.', '');
        $data = (new DateTime($this->dataVencimento))->format('Ymd');
        return "341" . $valor . $data . "3411550225630"; 
    }

    public function validar(): bool {
        $valorValido = $this->valor > 0;
        $dataHoje = new DateTime();
        $dataVenc = new DateTime($this->dataVencimento);
        return $valorValido && ($dataVenc >= $dataHoje);
    }

    protected function renderizarHtml(): string {
        return "<div>Boleto Itaú - R$ {$this->valor} - Venc: {$this->dataVencimento}</div>";
    }

    protected function renderizarPdf(): string {
        return "[PDF] Boleto Itaú - R$ {$this->valor} - Venc: {$this->dataVencimento}";
    }
}
