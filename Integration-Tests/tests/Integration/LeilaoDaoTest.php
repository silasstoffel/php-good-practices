<?php


namespace Alura\Leilao\Tests\Integration\Data;

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Dao\Leilao as EntityDao;
use \PDO;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase
{
    private static PDO $pdo;

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

    /**
     * @dataProvider auctions
     */
    public function testSearchUnfinishedAuctions(array $auctions)
    {
        $entityDao = new EntityDao(static::$pdo);
        /**@var Leilao[] $auctions */
        foreach ($auctions as $auction) {
            $entityDao->salva($auction);
        }

        // act
        $items = $entityDao->recuperarNaoFinalizados();

        // asserts
        self::assertCount(1, $items);
        self::assertContainsOnlyInstancesOf(Leilao::class, $items);
        self::assertSame(
            $auctions[0]->recuperarDescricao(),
            $items[0]->recuperarDescricao()
        );
    }

    /**
     * @dataProvider auctions
     */
    public function testSearchFinishedAuctions(array $auctions)
    {
        $entityDao = new EntityDao(static::$pdo);
        /**@var Leilao[] $auctions */
        foreach ($auctions as $auction) {
            $entityDao->salva($auction);
        }

        // act
        $items = $entityDao->recuperarFinalizados();

        // asserts
        self::assertCount(1, $items);
        self::assertContainsOnlyInstancesOf(Leilao::class, $items);
        self::assertSame(
            $auctions[1]->recuperarDescricao(),
            $items[0]->recuperarDescricao()
        );
    }

    public function testWhenUpdateAuctionStatusMustBeChanged()
    {
        // When Updating Auction status must be changed

        $auction = new Leilao('Argo 1.3 Drive');
        $auctionDao = new EntityDao(self::$pdo);
        $auctionDao->salva($auction);

        $auctions = $auctionDao->recuperarNaoFinalizados();
        static::assertCount(1, $auctions);
        static::assertSame(
            $auction->recuperarDescricao(),
            $auctions[0]->recuperarDescricao()
        );
        static::assertFalse($auctions[0]->estaFinalizado());

        $auction->finaliza();
        $auctionDao->salva($auction);

        $auctions = $auctionDao->recuperarFinalizados();
        static::assertCount(1, $auctions);
        static::assertSame(
            $auction->recuperarDescricao(),
            $auctions[0]->recuperarDescricao()
        );
        static::assertTrue($auctions[0]->estaFinalizado());
    }

    public function auctions(): array
    {
        $notFinished = new Leilao('Tempra Turbo 2.3');
        $finished = new Leilao('Uno Turbo GT');
        $finished->finaliza();

        return [
            [
                [$notFinished, $finished]
            ]
        ];
    }

}
