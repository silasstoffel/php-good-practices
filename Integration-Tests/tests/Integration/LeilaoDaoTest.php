<?php


namespace Alura\Leilao\Tests\Integration\Data;

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Dao\Leilao as EntityDao;
use Alura\Leilao\Infra\ConnectionCreator;
use PDO;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase
{


    private \PDO $pdo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pdo = ConnectionCreator::getConnection();
        $this->pdo->beginTransaction();
    }

    protected function tearDown(): void
    {
        $this->pdo->rollBack();
    }

    public function testInsertAndSearchNeedWorks()
    {
        // arrange
        $description = 'Tempra Turbo 2.3';
        $entity = new Leilao($description);
        $entityDao = new EntityDao($this->pdo);
        $entityDao->salva($entity);

        // act
        $items = $entityDao->recuperarNaoFinalizados();

        // asserts
        self::assertCount(1, $items);
        self::assertContainsOnlyInstancesOf(Leilao::class, $items);
        self::assertSame($description, $items[0]->recuperarDescricao());
    }

}
