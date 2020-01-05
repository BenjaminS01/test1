package de.bord.festival.ticket;

import de.bord.festival.exception.PriceLevelException;
import de.bord.festival.exception.TicketManagerException;
import org.junit.jupiter.api.Test;

import java.util.ArrayList;

import static org.junit.jupiter.api.Assertions.assertEquals;

import de.bord.festival.help.HelpClasses;

public class TicketTest {
    @Test
    void should_return_50_for_level1_getPercentageForPricelevel() throws PriceLevelException {

        // given 3 price levels for TicketManager1

        PriceLevel level1 = new PriceLevel(20.00, 39.99, 54.99,
                70.00);
        PriceLevel level2 = new PriceLevel(30.00, 49.99, 64.99,
                50.00);
        PriceLevel level3 = new PriceLevel(40.00, 59.99, 74.99,
                60.00);
        ArrayList<PriceLevel> priceLevels = new ArrayList<>();
        priceLevels.add(level1);
        priceLevels.add(level2);
        priceLevels.add(level3);

        DayTicket dayTicket = new DayTicket(Ticket.TicketType.DAY, 0, "day test", true, 01,"01.01.2020");
        CampingTicket campingTicket = new CampingTicket(Ticket.TicketType.CAMPING, 1000, "camping test", true, 02 );
        VIPTicket vipTicket = new VIPTicket(Ticket.TicketType.VIP, 5000, "vip test", true, 100.00);

        // when ( Collections.sort(priceLevels) in Constructor )
        TicketManager ticketManager1 = new TicketManager(priceLevels, 3, 1000,20000,300,dayTicket,campingTicket,vipTicket);

        //then
        assertEquals(50, ticketManager1.getPriceLevel(0).getPercentageForPricelevel());
    }
    @Test
    void should_return_70_for_level1_getPercentageForPricelevel() throws PriceLevelException {

        // given 3 price levels for TicketManager1

        PriceLevel level1 = new PriceLevel(20.00, 39.99, 54.99,
                70.00);
        PriceLevel level2 = new PriceLevel(30.00, 49.99, 64.99,
                50.00);
        PriceLevel level3 = new PriceLevel(40.00, 59.99, 74.99,
                60.00);
        ArrayList<PriceLevel> priceLevels = new ArrayList<>();
        priceLevels.add(level1);
        priceLevels.add(level2);
        priceLevels.add(level3);

        DayTicket dayTicket = new DayTicket(Ticket.TicketType.DAY, 0, "day test", true, 01,"01.01.2020");
        CampingTicket campingTicket = new CampingTicket(Ticket.TicketType.CAMPING, 1000, "camping test", true, 02 );
        VIPTicket vipTicket = new VIPTicket(Ticket.TicketType.VIP, 5000, "vip test", true, 100.00);

        // when ( Collections.sort(priceLevels) in Constructor )
        TicketManager ticketManager1 = new TicketManager(priceLevels, 3, 1000,20000,300, dayTicket, campingTicket ,vipTicket);
        //then
        assertEquals(70, ticketManager1.getPriceLevel(2).getPercentageForPricelevel());
    }

    @Test
    void should_return_Festival_2020_DayTicket_for_ticketManager1_setStdPrice() throws PriceLevelException {

        // given TicketManager with DayTicket dayticket.description = "day test"
        HelpClasses helpClasses = new HelpClasses();
        TicketManager ticketManager1 = helpClasses.exampleTicketManager();

        // when
        ticketManager1.getTicket(Ticket.TicketType.DAY).setDescription("Festival 2020 DayTicket");

        // then
        assertEquals("Festival 2020 DayTicket", ticketManager1.getTicket(Ticket.TicketType.DAY).getDescription());

    }

    @Test
    void should_return_59_99_for_ticketManager1_campingTicket_getStdPrice_after_setPricelevel_() throws PriceLevelException, TicketManagerException {

        // given
        HelpClasses helpClasses = new HelpClasses();
        TicketManager ticketManager1 = helpClasses.exampleTicketManager();

        // when ( pricelevel set from 0 to 1 )
        ticketManager1.setAutomaticPriceLevelChange(false);
        ticketManager1.setPriceLevel(1);

        // then
        assertEquals(59.99, ticketManager1.getTicket(Ticket.TicketType.CAMPING).getStdPrice());

    }
    @Test
    void should_return_52_49_for_ticketManager1_vipTicket_getStdPrice_after_setTicketPrices_in_Constructor() throws PriceLevelException, TicketManagerException {

        // given ( exampleTicketManager.vipTicket.stdPrice = 100.00 )
        HelpClasses helpClasses = new HelpClasses();
        //when
        TicketManager ticketManager1 = helpClasses.exampleTicketManager();

        // then
        assertEquals(52.49, ticketManager1.getTicket(Ticket.TicketType.VIP).getStdPrice());

    }

    @Test
    void should_return_xxxx_for_getIncomeTicketSales(){
        
    }

}
