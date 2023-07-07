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
            "4 de Janeiro",
            "Aeroclube",
            "Setor Campinas",
            "Alphaville",
            "Alphaville BR-364",
            "Aponiã",
            "Areal Centro",
            "Areia Branca",
            "Arigolândia",
            "Setor Industrial",
            "Bairro Militar ",
            "Bairro Novo",
            "Baixa da União",
            "Caiari",
            "Caladinho",
            "Cascalheira",
            "Castanheira",
            "Costa e Silva",
            "Centro",
            "Cidade do Lobo",
            "Cidade Nova",
            "Cohab",
            "Conceição",
            "Cuniã",
            "Conjunto Marechal Rondon ",
            "Conjunto Dnit - br 319",
            "Eldorado",
            "Eletronorte",
            "Embratel",
            "Esperança da Comunidade",
            "Escola de Polícia",
            "Flodoaldo Pontes Pinto",
            "Floresta",
            "Igarapé",
            "Jardim América",
            "Jardim das Mangueiras",
            "Jardim Eldorado",
            "Jardim Primavera",
            "Jardim Santana",
            "Juscelino Kubitschek (JK)",
            "Lagoa",
            "Lagoinha",
            "Liberdade",
            "Marcos Freire",
            "Mariana",
            "Mato Grosso ",
            "Meu Pedacinho de Chão ",
            "Mocambo ",
            "Nacional ",
            "Nossa Senhora das Graças",
            "Nova Esperança",
            "Nova Floresta ",
            "Novo Horizonte",
            "Nova Porto Velho ",
            "Olaria ",
            "Panair ",
            "Parque Ceará ",
            "Pedrinhas ",
            "Pólo Industrial ",
            "Planalto ",
            "Rio Madeira ",
            "Ronaldo Aragão",
            "Roque ",
            "Santa Bárbara ",
            "São Cristóvão ",
            "São Francisco ",
            "São João Bosco ",
            "São Sebastião",
            "São Sebastião I",
            "São Sebastião II",
            "Socialista",
            "Tancredo Neves",
            "Teixeirão",
            "Tiradentes",
            "Três Marias",
            "Triângulo",
            "Tucumanzal",
            "Ulisses Guimarães",
            "Vila Tupy ",
        ];

        foreach ($bairros as $bairro) {
            Bairro::create([
                'ds_bairro' => $bairro
            ]);
        }
    }
}

