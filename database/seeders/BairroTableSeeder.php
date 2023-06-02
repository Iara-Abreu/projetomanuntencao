<?php

namespace Database\Seeders;

use App\Models\Bairro;
use Illuminate\Database\Seeder;

class BairroTableSeeder extends Seeder
{
    public function run()
    {
        $bairros = [
            "Agenor de Carvalho",
            "Cristal",
            "4 de Janeiro 10",
            "Aeroclube 10",
            "Setor Campinas",
            "Alphaville 10",
            "Alphaville da BR-364",
            "Aponiã 10",
            "Areal Centro 10",
            "Areia Branca 15",
            "Arigolândia 15",
            "Setor Industrial 10",
            "Bairro Militar 10",
            "Bairro Novo 15",
            "Baixa da União 15",
            "Caiari 15",
            "Caladinho 12",
            "Cascalheira 15",
            "Castanheira 15",
            "Costa e Silva 12",
            "Centro 12",
            "Cidade do Lobo 12",
            "Cidade Nova 12",
            "Cohab 12",
            "Conceição 12",
            "Cuniã 10",
            "Conjunto Marechal Rondon 8",
            "Conjunto Dnit - br 319",
            "Eldorado 10",
            "Eletronorte 12",
            "Embratel 8",
            "Esperança da Comunidade 10",
            "Escola de Polícia 10",
            "Flodoaldo Pontes Pinto 8",
            "Floresta 12",
            "Igarapé 8",
            "Jardim América 12",
            "Jardim das Mangueiras 8",
            "Jardim Eldorado 10",
            "Jardim Primavera 8",
            "Jardim Santana 12",
            "Juscelino Kubitschek (JK)10",
            "Lagoa 6",
            "Lagoinha 8",
            "Liberdade 12",
            "Marcos Freire",
            "Mariana",
            "Mato Grosso 12",
            "Meu Pedacinho de Chão 10",
            "Mocambo 15",
            "Nacional 15",
            "Nossa Senhora das Graças 10",
            "Nova Esperança 12",
            "Nova Floresta 12",
            "Novo Horizonte",
            "Nova Porto Velho 8",
            "Olaria 15",
            "Panair 15",
            "Parque Ceará 8",
            "Pedrinhas 15",
            "Pólo Industrial 12",
            "Planalto 15",
            "Rio Madeira 10",
            "Ronaldo Aragão",
            "Roque 12",
            "Santa Bárbara 12",
            "São Cristóvão 12",
            "São Francisco 15",
            "São João Bosco 12",
            "São Sebastião 15",
            "São Sebastião I 15",
            "São Sebastião II 15",
            "Socialista 15",
            "Tancredo Neves 10",
            "Teixeirão 12",
            "Tiradentes 8",
            "Três Marias 8",
            "Triângulo 15",
            "Tucumanzal 12",
            "Ulisses Guimarães",
            "Vila Tupy 12",
        ];

        foreach ($bairros as $bairro) {
            Bairro::create([
                'ds_bairro' => $bairro
            ]);
        }
    }
}

