<?php


namespace Alura\Leilao\Tests\Integration\Data;

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Dao\Leilao as EntityDao;
use \PDO;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase
{


    private static \PDO $pdo;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$pdo = new \PDO('sqlite::memory:');
        $table = 'CREATE TABLE leiloes (id INTEGER PRIMARY KEY, descricao TEXT, finalizado BOOL, dataInicio TEXT)';
        static::$pdo->exec($table);
    }

    protected function setUp(): void
    {
        parent::setUp();
        static::$pdo->beginTransaction();
    }

    protected function tearDown(): void
    {
        static::$pdo->rollBack();
    }

    public function testInsertAndSearchNeedWorks()
    {
        // arrange
        $description = 'Tempra Turbo 2.3';
        $entity = new Leilao($description);
        $entityDao = new EntityDao(static::$pdo);
        $entityDao->salva($entity);

        // act
        $items = $entityDao->recuperarNaoFinalizados();

        // asserts
        self::assertCount(1, $items);
        self::assertContainsOnlyInstancesOf(Leilao::class, $items);
        self::assertSame($description, $items[0]->recuperarDescricao());
    }

}
