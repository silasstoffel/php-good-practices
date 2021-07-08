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
        // arrange
        $pdo = ConnectionCreator::getConnection();
        $description = 'Tempra Turbo 2.3';
        $entity = new Leilao($description);
        $entityDao = new EntityDao($pdo);
        $entityDao->salva($entity);

        // act
        $items = $entityDao->recuperarNaoFinalizados();

        // asserts
        self::assertCount(1, $items);
        self::assertContainsOnlyInstancesOf(Leilao::class, $items);
        self::assertSame($description, $items[0]->recuperarDescricao());

        // tear down
        $pdo->exec('DELETE FROM leiloes');
    }

}
