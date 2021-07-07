<?php


namespace Alura\Leilao\Tests\Integration\Data;

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Dao\Leilao as EntityDao;
use Alura\Leilao\Infra\ConnectionCreator;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase
{
    public function testInsertAndSearchNeedWorks()
    {
        $description = 'Tempra Turbo 2.3';
        $entity = new Leilao($description);
        $entityDao = new EntityDao(
            ConnectionCreator::getConnection()
        );
        $entityDao->salva($entity);

        $items = $entityDao->recuperarNaoFinalizados();
        self::assertContains(1, $items);
        self::assertContainsOnlyInstancesOf(Leilao::class, $items);
        self::assertSame($description, $items[0]->recuperarDescricao());
    }

}
